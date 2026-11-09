<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AsramaController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\SantriController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\AbsensiController;
use App\Models\Asrama;
use App\Models\Kamar;
use App\Models\Santri;
use App\Models\Pembayaran;
use App\Models\Absensi;

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.process');
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.process');
});

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware('auth')->group(function () {
    // Arahkan setiap akun ke dashboard sesuai rolenya.
    Route::get('/', function () {
        return auth()->user()->role === 'admin'
            ? redirect()->route('admin.dashboard')
            : redirect()->route('user.dashboard');
    })->name('dashboard');

    $dashboardData = function () {
        return [
            'asramas' => Asrama::with('kamars')->get(),
            'kamars' => Kamar::with(['asrama', 'santris'])->get(),
            'santris' => Santri::with(['kamar', 'pembayarans', 'absensis'])->get(),
            'pembayarans' => Pembayaran::with('santri')->get(),
            'absensis' => Absensi::with('santri')->get(),
            'totalAsrama' => Asrama::count(),
            'totalKamar' => Kamar::count(),
            'totalSantri' => Santri::count(),
            'totalPembayaran' => Pembayaran::count(),
            'totalAbsensi' => Absensi::count(),
        ];
    };

    Route::get('/admin/dashboard', function () use ($dashboardData) {
        return view('admin.dashboard', $dashboardData());
    })->middleware('role:admin')->name('admin.dashboard');

    Route::get('/user/dashboard', function () use ($dashboardData) {
        return view('user.dashboard', $dashboardData());
    })->middleware('role:user')->name('user.dashboard');

    // Admin dan User boleh melihat serta menambahkan data.
    Route::resource('asramas', AsramaController::class)->only(['index', 'create', 'store']);
    Route::resource('kamars', KamarController::class)->only(['index', 'create', 'store']);
    Route::resource('santris', SantriController::class)->only(['index', 'create', 'store']);
    Route::resource('pembayarans', PembayaranController::class)->only(['index', 'create', 'store']);
    Route::resource('absensis', AbsensiController::class)->only(['index', 'create', 'store']);

    // Hanya Admin yang boleh mengedit dan menghapus.
    Route::middleware('role:admin')->group(function () {
        Route::resource('asramas', AsramaController::class)->only(['edit', 'update', 'destroy']);
        Route::resource('kamars', KamarController::class)->only(['edit', 'update', 'destroy']);
        Route::resource('santris', SantriController::class)->only(['edit', 'update', 'destroy']);
        Route::resource('pembayarans', PembayaranController::class)->only(['edit', 'update', 'destroy']);
        Route::resource('absensis', AbsensiController::class)->only(['edit', 'update', 'destroy']);
    });
});
