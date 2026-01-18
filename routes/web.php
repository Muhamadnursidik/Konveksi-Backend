<?php

use App\Http\Controllers\Admin\BahanBakuController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\FinishingController;
use App\Http\Controllers\Admin\JobProduksiController;
use App\Http\Controllers\Admin\ModelPakaianController;
use App\Http\Controllers\Admin\PemotongController;
use App\Http\Controllers\Admin\PenjahitController;
use App\Http\Controllers\Finishing\DashboardController as FinishingDashboard;
use App\Http\Controllers\Pemotong\DashboardController as PemotongDashboard;
use App\Http\Controllers\Pemotong\DataBahanBakuController;
use App\Http\Controllers\Pemotong\JobPotongController;
use App\Http\Controllers\Penjahit\DashboardController as PenjahitDashboard;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', fn() => redirect('/login'));

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    $role = auth::user()->role;

    return match ($role) {
        'admin'     => redirect()->route('admin.dashboard'),
        'pemotong'  => redirect()->route('pemotong.dashboard'),
        'penjahit'  => redirect()->route('penjahit.dashboard'),
        'finishing' => redirect()->route('finishing.dashboard'),
        default     => abort(403),
    };
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->group(function () {
        Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('admin.dashboard');
        Route::resource('pemotong', PemotongController::class)->names('admin.pemotong');
        Route::resource('penjahit', PenjahitController::class)->names('admin.penjahit');
        Route::resource('finishing', FinishingController::class)->names('admin.finishing');
        Route::resource('bahan-baku', BahanBakuController::class)->names('admin.bahan-baku');
        Route::resource('model-pakaian', ModelPakaianController::class)->names('admin.model-pakaian');
        Route::resource('job-produksi', JobProduksiController::class)->names('admin.job-produksi');
    });

Route::middleware(['auth', 'role:pemotong'])
    ->prefix('pemotong')
    ->group(function () {
        Route::get('/dashboard', [PemotongDashboard::class, 'index'])->name('pemotong.dashboard');
        Route::resource('data-bahan-baku', DataBahanBakuController::class)->names('pemotong.data-bahan-baku');
        Route::get('/job-potong', [JobPotongController::class, 'index'])
            ->name('pemotong.job-potong.index');
        Route::post('/job-potong/{job}/selesai', [JobPotongController::class, 'selesai'])
            ->name('pemotong.job-potong.selesai');
        Route::get('/riwayat-potong', [JobPotongController::class, 'riwayat'])
            ->name('pemotong.job-potong.riwayat');
    });

Route::middleware(['auth', 'role:penjahit'])
    ->prefix('penjahit')
    ->group(function () {
        Route::get('/dashboard', [PenjahitDashboard::class, 'index'])
            ->name('penjahit.dashboard');
    });

Route::middleware(['auth', 'role:finishing'])
    ->prefix('finishing')
    ->group(function () {
        Route::get('/dashboard', [FinishingDashboard::class, 'index'])
            ->name('finishing.dashboard');
    });

require __DIR__ . '/auth.php';
