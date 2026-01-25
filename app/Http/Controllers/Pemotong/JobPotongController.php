<?php

namespace App\Http\Controllers\Pemotong;

use App\Http\Controllers\Controller;
use App\Models\JobProduksi;
use App\Models\Pemotongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class JobPotongController extends Controller
{
    /**
     * Job yang siap dipotong
     */
    public function index()
    {
        $jobs = JobProduksi::with('modelPakaian')
            ->where('status', 'menunggu')
            ->whereDoesntHave('pemotongan') // belum pernah dipotong
            ->orderBy('created_at')
            ->get();

        return view('pemotong.job-potong', compact('jobs'));
    }

    /**
     * Submit hasil pemotongan + bukti
     */
    public function selesai(Request $request, JobProduksi $job)
    {
        if ($job->status !== 'menunggu') {
            abort(403, 'Job tidak bisa dipotong');
        }

        if ($job->pemotongan) {
            return back()->with('error', 'Job ini sudah dipotong');
        }

        $request->validate([
            'foto_bukti' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = $request->file('foto_bukti')
            ->store('bukti/pemotongan', 'public');

        Pemotongan::create([
            'job_produksi_id' => $job->id,
            'pemotong_id'     => Auth::id(),
            'foto_bukti'      => $path,
            'status'          => 'pending',
        ]);

        return back()->with(
            'success',
            'Pemotongan selesai, menunggu ACC admin'
        );
    }

    /**
     * Riwayat pemotongan milik pemotong login
     */
    public function riwayat()
    {
        $jobs = Pemotongan::with([
                'jobProduksi.modelPakaian'
            ])
            ->where('pemotong_id', Auth::id())
            ->orderByDesc('created_at')
            ->get();

        return view('pemotong.riwayat-potong', compact('jobs'));
    }
}
