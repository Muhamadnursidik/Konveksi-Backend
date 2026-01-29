<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobProduksi;
use App\Models\ModelPakaian;
use App\Models\BahanBaku;
use App\Models\ProdukJadi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobProduksiController extends Controller
{
    public function index()
    {
        $data = JobProduksi::with([
            'modelPakaian',
            'bahanBaku',
            'pemotongan.pemotong',
            'penjahitan.penjahit',
            'finishing.finishing',
        ])->latest()->get();

        return view('admin.job-produksi.index', compact('data'));
    }

    public function create()
    {
        return view('admin.job-produksi.create', [
            'modelPakaian' => ModelPakaian::all(),
            'bahanBaku'    => BahanBaku::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'model_pakaian_id' => 'required|exists:model_pakaian,id',
            'bahan_baku_id'    => 'required|exists:bahan_baku,id',
            'jumlah_target'    => 'required|integer|min:1',
        ]);

        DB::transaction(function () use ($request) {

            $model = ModelPakaian::findOrFail($request->model_pakaian_id);
            $bahan = BahanBaku::findOrFail($request->bahan_baku_id);

            $kebutuhan = $model->kebutuhan_bahan * $request->jumlah_target;

            if ($bahan->stok_meter < $kebutuhan) {
                return back()->with('error', 'Stok bahan baku tidak mencukupi');
            }

            JobProduksi::create([
                'model_pakaian_id'      => $model->id,
                'bahan_baku_id'         => $bahan->id,
                'jumlah_target'         => $request->jumlah_target,
                'kebutuhan_bahan_total' => $kebutuhan,
                'status'                => 'menunggu',
            ]);

            $bahan->decrement('stok_meter', $kebutuhan);
        });

        return redirect()->route('admin.job-produksi.index')
            ->with('success', 'Job produksi berhasil dibuat');
    }

    /**
     * ❌ EDIT TIDAK BOLEH UBAH STATUS
     */
    public function edit(JobProduksi $jobProduksi)
    {
        if ($jobProduksi->status !== 'menunggu') {
            return back()->with('error', 'Job sudah berjalan, tidak bisa diedit');
        }

        return view('admin.job-produksi.edit', [
            'jobProduksi'  => $jobProduksi,
            'modelPakaian' => ModelPakaian::all(),
            'bahanBaku'    => BahanBaku::all(),
        ]);
    }

    public function update(Request $request, JobProduksi $jobProduksi)
    {
        if ($jobProduksi->status !== 'menunggu') {
            return back()->with('error', 'Status hanya berubah lewat ACC');
        }

        $request->validate([
            'model_pakaian_id' => 'required|exists:model_pakaian,id',
            'bahan_baku_id'    => 'required|exists:bahan_baku,id',
            'jumlah_target'    => 'required|integer|min:1',
        ]);

        DB::transaction(function () use ($request, $jobProduksi) {

            // balikin stok lama
            $jobProduksi->bahanBaku->increment(
                'stok_meter',
                $jobProduksi->kebutuhan_bahan_total
            );

            $model = ModelPakaian::findOrFail($request->model_pakaian_id);
            $bahan = BahanBaku::findOrFail($request->bahan_baku_id);

            $kebutuhanBaru = $model->kebutuhan_bahan * $request->jumlah_target;

            if ($bahan->stok_meter < $kebutuhanBaru) {
                abort(400, 'Stok bahan baku tidak mencukupi');
            }

            $bahan->decrement('stok_meter', $kebutuhanBaru);

            $jobProduksi->update([
                'model_pakaian_id'      => $model->id,
                'bahan_baku_id'         => $bahan->id,
                'jumlah_target'         => $request->jumlah_target,
                'kebutuhan_bahan_total' => $kebutuhanBaru,
            ]);
        });

        return redirect()->route('admin.job-produksi.index')
            ->with('success', 'Job produksi diperbarui');
    }

    public function destroy(JobProduksi $jobProduksi)
    {
        if ($jobProduksi->status !== 'menunggu') {
            return back()->with('error', 'Job sedang berjalan');
        }

        DB::transaction(function () use ($jobProduksi) {
            $jobProduksi->bahanBaku->increment(
                'stok_meter',
                $jobProduksi->kebutuhan_bahan_total
            );
            $jobProduksi->delete();
        });

        return back()->with('success', 'Job produksi dihapus');
    }

    /* =========================
       ======= ACC FLOW ========
       ========================= */

    public function accPemotongan(JobProduksi $job)
    {
        if (! $job->pemotongan || $job->pemotongan->status !== 'pending') {
            return back()->with('error', 'Pemotongan belum siap');
        }

        DB::transaction(function () use ($job) {
            $job->pemotongan->update(['status' => 'dipotong']);
            $job->update(['status' => 'dipotong']);
        });

        return back()->with('success', 'Pemotongan di-ACC');
    }

    public function accPenjahitan(JobProduksi $job)
    {
        if (! $job->penjahitan || $job->penjahitan->status !== 'pending') {
            return back()->with('error', 'Penjahitan belum siap');
        }

        DB::transaction(function () use ($job) {
            $job->penjahitan->update(['status' => 'dijahit']);
            $job->update(['status' => 'dijahit']);
        });

        return back()->with('success', 'Penjahitan di-ACC');
    }

    public function accFinishing(JobProduksi $job)
    {
        if (! $job->finishing || $job->finishing->status !== 'pending') {
            return back()->with('error', 'Finishing belum siap');
        }

        DB::transaction(function () use ($job) {
            $job->finishing->update(['status' => 'selesai']);
            $job->update(['status' => 'selesai']);

            ProdukJadi::firstOrCreate([
                'job_produksi_id' => $job->id
            ], [
                'tanggal_selesai' => now()
            ]);
        });

        return back()->with('success', 'Finishing di-ACC, produk jadi dibuat');
    }
}
