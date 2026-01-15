<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobProduksi;
use App\Models\ModelPakaian;
use Illuminate\Http\Request;

class JobProduksiController extends Controller
{
    public function index()
    {
        $data = JobProduksi::with('modelPakaian')->latest()->get();
        return view('admin.job-produksi.index', compact('data'));
    }

    public function create()
    {
        $modelPakaian = ModelPakaian::all();
        return view('admin.job-produksi.create', compact('modelPakaian'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'model_pakaian_id' => 'required|exists:model_pakaian,id',
            'jumlah_target' => 'required|integer|min:1',
        ]);

        JobProduksi::create([
            'model_pakaian_id' => $request->model_pakaian_id,
            'jumlah_target' => $request->jumlah_target,
            'status' => 'menunggu',
        ]);

        return redirect()->route('admin.job-produksi.index')
            ->with('success', 'Data produksi berhasil ditambahkan');
    }

    public function edit(JobProduksi $jobProduksi)
    {
        $modelPakaian = ModelPakaian::all();
        return view('admin.job-produksi.edit', compact('jobProduksi','modelPakaian'));
    }

    public function update(Request $request, JobProduksi $jobProduksi)
    {
        $request->validate([
            'model_pakaian_id' => 'required|exists:model_pakaian,id',
            'jumlah_target' => 'required|integer|min:1',
            'status' => 'required',
        ]);

        $jobProduksi->update($request->all());

        return redirect()->route('admin.job-produksi.index')
            ->with('success', 'Data produksi diperbarui');
    }

    public function destroy(JobProduksi $jobProduksi)
    {
        $jobProduksi->delete();
        return back()->with('success', 'Data produksi dihapus');
    }
}
