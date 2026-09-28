<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('dashboard', [
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
    ]);
});

Route::resource('asramas', AsramaController::class)->except(['show']);
Route::resource('kamars', KamarController::class)->except(['show']);
Route::resource('santris', SantriController::class)->except(['show']);
Route::resource('pembayarans', PembayaranController::class)->except(['show']);
Route::resource('absensis', AbsensiController::class)->except(['show']);