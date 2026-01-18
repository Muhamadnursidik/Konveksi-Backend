<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobProduksi;
use App\Models\ModelPakaian;
use App\Models\BahanBaku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobProduksiController extends Controller
{
    public function index()
    {
        $data = JobProduksi::with(['modelPakaian', 'bahanBaku'])
            ->latest()
            ->get();

        return view('admin.job-produksi.index', compact('data'));
    }

    public function create()
    {
        $modelPakaian = ModelPakaian::all();
        $bahanBaku = BahanBaku::all();

        return view('admin.job-produksi.create', compact('modelPakaian', 'bahanBaku'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'model_pakaian_id' => 'required|exists:model_pakaian,id',
            'bahan_baku_id' => 'required|exists:bahan_baku,id',
            'jumlah_target' => 'required|integer|min:1',
        ]);

        DB::transaction(function () use ($request) {

            $model = ModelPakaian::findOrFail($request->model_pakaian_id);
            $bahan = BahanBaku::findOrFail($request->bahan_baku_id);

            $kebutuhanTotal = $model->kebutuhan_bahan * $request->jumlah_target;

            if ($bahan->stok_meter < $kebutuhanTotal) {
                throw new \Exception('Stok bahan baku tidak mencukupi');
            }

            JobProduksi::create([
                'model_pakaian_id' => $model->id,
                'bahan_baku_id' => $bahan->id,
                'jumlah_target' => $request->jumlah_target,
                'kebutuhan_bahan_total' => $kebutuhanTotal,
                'status' => 'menunggu',
            ]);

            $bahan->decrement('stok_meter', $kebutuhanTotal);
        });

        return redirect()
            ->route('admin.job-produksi.index')
            ->with('success', 'Job produksi berhasil dibuat');
    }

    public function edit(JobProduksi $jobProduksi)
    {
        $modelPakaian = ModelPakaian::all();
        $bahanBaku = BahanBaku::all();

        return view(
            'admin.job-produksi.edit',
            compact('jobProduksi', 'modelPakaian', 'bahanBaku')
        );
    }

    public function update(Request $request, JobProduksi $jobProduksi)
    {
        $request->validate([
            'model_pakaian_id' => 'required|exists:model_pakaian,id',
            'bahan_baku_id' => 'required|exists:bahan_baku,id',
            'jumlah_target' => 'required|integer|min:1',
            'status' => 'required',
        ]);

        DB::transaction(function () use ($request, $jobProduksi) {

            // kembalikan stok lama
            $jobProduksi->bahanBaku->increment(
                'stok_meter',
                $jobProduksi->kebutuhan_bahan_total
            );

            $model = ModelPakaian::findOrFail($request->model_pakaian_id);
            $bahan = BahanBaku::findOrFail($request->bahan_baku_id);

            $kebutuhanBaru = $model->kebutuhan_bahan * $request->jumlah_target;

            if ($bahan->stok_meter < $kebutuhanBaru) {
                throw new \Exception('Stok bahan baku tidak mencukupi');
            }

            $jobProduksi->update([
                'model_pakaian_id' => $model->id,
                'bahan_baku_id' => $bahan->id,
                'jumlah_target' => $request->jumlah_target,
                'kebutuhan_bahan_total' => $kebutuhanBaru,
                'status' => $request->status,
            ]);

            $bahan->decrement('stok_meter', $kebutuhanBaru);
        });

        return redirect()
            ->route('admin.job-produksi.index')
            ->with('success', 'Job produksi berhasil diperbarui');
    }

    public function destroy(JobProduksi $jobProduksi)
    {
        DB::transaction(function () use ($jobProduksi) {
            // balikin stok
            $jobProduksi->bahanBaku->increment(
                'stok_meter',
                $jobProduksi->kebutuhan_bahan_total
            );

            $jobProduksi->delete();
        });

        return back()->with('success', 'Job produksi dihapus');
    }
}
