<?php

namespace App\Http\Controllers\Finishing;

use App\Http\Controllers\Controller;
use App\Models\JobProduksi;

class JobFinishingController extends Controller
{
    public function index()
    {
        $jobs = JobProduksi::with('modelPakaian')
            ->where('status', 'dijahit')
            ->orderBy('updated_at')
            ->get();

        return view('finishing.job.index', compact('jobs'));
    }

    public function selesai(JobProduksi $job)
    {
        if ($job->status !== 'dijahit') {
            return back()->with('error', 'Job tidak valid untuk finishing');
        }

        $job->update([
            'status' => 'selesai'
        ]);

        return back()->with('success', 'Job berhasil difinishing & dipacking');
    }

    public function riwayat()
    {
        $jobs = JobProduksi::with('modelPakaian')
            ->where('status', 'selesai')
            ->latest()
            ->get();

        return view('finishing.job.riwayat', compact('jobs'));
    }
}
