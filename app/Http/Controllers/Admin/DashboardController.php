<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobProduksi;

class DashboardController extends Controller
{

    public function index()
    {
        $totalJob    = JobProduksi::count();
        $jobAktif    = JobProduksi::where('status', '!=', 'selesai')->count();
        $jobSelesai  = JobProduksi::where('status', 'selesai')->count();
        $totalTarget = JobProduksi::sum('jumlah_target');

        $jobTerbaru = JobProduksi::with('modelPakaian')
            ->latest()
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalJob',
            'jobAktif',
            'jobSelesai',
            'totalTarget',
            'jobTerbaru'
        ));
    }

}
