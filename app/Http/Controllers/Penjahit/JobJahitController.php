<?php

namespace App\Http\Controllers\Penjahit;

use App\Http\Controllers\Controller;
use App\Models\JobProduksi;

class JobJahitController extends Controller
{
    public function index()
    {
        $jobs = JobProduksi::with('modelPakaian')
            ->where('status', 'dipotong')
            ->orderBy('updated_at')
            ->get();

        return view('penjahit.job.index', compact('jobs'));
    }

    public function mulai(JobProduksi $job)
    {
        if ($job->status !== 'dipotong') {
            return back()->with('error', 'Job tidak bisa dikerjakan');
        }

        // Optional kalau mau tracking
        $job->update([
            'status' => 'dipotong' // tetap, cuma penanda mulai
        ]);

        return back()->with('success', 'Job mulai dijahit');
    }

    public function selesai(JobProduksi $job)
    {
        if ($job->status !== 'dipotong') {
            return back()->with('error', 'Job tidak valid');
        }

        $job->update([
            'status' => 'dijahit'
        ]);

        return back()->with('success', 'Job selesai dijahit');
    }

    public function riwayat()
    {
        $jobs = JobProduksi::with('modelPakaian')
            ->where('status', 'dijahit')
            ->latest()
            ->get();

        return view('penjahit.job.riwayat', compact('jobs'));
    }
}
