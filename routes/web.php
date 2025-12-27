<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Pemotong\DashboardController as PemotongDashboard;
use App\Http\Controllers\Penjahit\DashboardController as PenjahitDashboard;
use App\Http\Controllers\Finishing\DashboardController as FinishingDashboard;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', fn () => redirect('/login'));

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

Route::middleware(['auth','role:admin'])
    ->prefix('admin')
    ->group(function () {
        Route::get('/dashboard', [AdminDashboard::class, 'index'])
            ->name('admin.dashboard');
    });

Route::middleware(['auth','role:pemotong'])
    ->prefix('pemotong')
    ->group(function () {
        Route::get('/dashboard', [PemotongDashboard::class, 'index'])
            ->name('pemotong.dashboard');
    });

Route::middleware(['auth','role:penjahit'])
    ->prefix('penjahit')
    ->group(function () {
        Route::get('/dashboard', [PenjahitDashboard::class, 'index'])
            ->name('penjahit.dashboard');
    });

Route::middleware(['auth','role:finishing'])
    ->prefix('finishing')
    ->group(function () {
        Route::get('/dashboard', [FinishingDashboard::class, 'index'])
            ->name('finishing.dashboard');
    });


require __DIR__.'/auth.php';
