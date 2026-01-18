<?php
namespace App\Http\Controllers\Pemotong;

use App\Http\Controllers\Controller;
use App\Models\JobProduksi;

class JobPotongController extends Controller
{
    public function index()
    {
        $jobs = JobProduksi::with('modelPakaian')
            ->where('status', 'menunggu')
            ->orderBy('created_at')
            ->get();

        return view('pemotong.job-potong', compact('jobs'));
    }

    public function selesai(JobProduksi $job)
    {
        if ($job->status !== 'menunggu') {
            abort(403);
        }

        $job->update([
            'status' => 'dipotong',
        ]);

        return back()->with('success', 'Job berhasil diselesaikan');
    }

    public function riwayat()
    {
        $jobs = JobProduksi::with('modelPakaian')
            ->where('status', 'dipotong')
            ->orderByDesc('updated_at')
            ->get();

        return view('pemotong.riwayat-potong', compact('jobs'));
    }

}
