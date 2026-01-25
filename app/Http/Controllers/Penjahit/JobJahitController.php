<?php

namespace App\Http\Controllers\Penjahit;

use App\Http\Controllers\Controller;
use App\Models\JobProduksi;
use App\Models\Penjahitan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobJahitController extends Controller
{
    /**
     * Job yang siap dijahit
     */
    public function index()
    {
        $jobs = JobProduksi::with([
                'modelPakaian',
                'pemotongan.pemotong'
            ])
            ->where('status', 'dipotong')
            ->whereDoesntHave('penjahitan') // belum dijahit
            ->orderBy('updated_at')
            ->get();

        return view('penjahit.job.index', compact('jobs'));
    }

    /**
     * Submit hasil jahit + bukti
     */
    public function selesai(Request $request, JobProduksi $job)
    {
        if ($job->status !== 'dipotong') {
            abort(403, 'Job tidak bisa dijahit');
        }

        if ($job->penjahitan) {
            return back()->with('error', 'Job ini sudah dijahit');
        }

        $request->validate([
            'bukti_jahit' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = $request->file('bukti_jahit')
            ->store('bukti/penjahitan', 'public');

        Penjahitan::create([
            'job_produksi_id' => $job->id,
            'pemotong_id'     => $job->pemotongan->pemotong_id,
            'penjahit_id'     => Auth::id(),
            'foto_bukti'      => $path,
            'status'          => 'pending',
        ]);

        return back()->with(
            'success',
            'Jahitan selesai, menunggu ACC admin'
        );
    }

    /**
     * Riwayat jahit milik penjahit login
     */
    public function riwayat()
    {
        $jobs = Penjahitan::with([
                'jobProduksi.modelPakaian'
            ])
            ->where('penjahit_id', Auth::id())
            ->orderByDesc('created_at')
            ->get();

        return view('penjahit.job.riwayat', compact('jobs'));
    }
}
