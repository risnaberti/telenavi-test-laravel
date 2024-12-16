<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PendaftaranTryoutController;
use App\Http\Controllers\PesanwaController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\RoleAndPermissionController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'doLogin']);

    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'doRegister']);

    Route::get('/', [LandingController::class, 'index'])->name('landing');
    Route::post('/tryout/daftar', [PesertaController::class, 'daftar'])->name('tryout.daftar');
    Route::get('/tryout/info-login', [PesertaController::class, 'infoLogin'])->name('tryout.info-login');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::post('/profile', [AuthController::class, 'updateProfile']);

    Route::get('/change-password', [AuthController::class, 'changePassword'])->name('change-password');
    Route::post('/change-password', [AuthController::class, 'doChangePassword']);

    // user manajemen
    Route::get('/permissions/refresh', [RoleAndPermissionController::class, 'refreshPermission'])->name('permissions.refresh');
    Route::resource('roles', RoleAndPermissionController::class);
    Route::resource('users', UserController::class);
    Route::resource('pesanwa', PesanwaController::class);
    Route::resource('siswa', SiswaController::class);

    // proses bisnis
    Route::get('/pendaftaran-tryout/rekap-pendaftar', [PendaftaranTryoutController::class, 'rekapPendaftar'])->name('pendaftaran-tryout.rekap-pendaftar');
    Route::get('/pendaftaran-tryout/rekap-pendaftar-excel', [PendaftaranTryoutController::class, 'rekapPendaftarExcel'])->name('pendaftaran-tryout.rekap-pendaftar-excel');

    Route::get('/pendaftaran-tryout/laporan-pembayaran', [PendaftaranTryoutController::class, 'laporanPembayaran'])->name('pendaftaran-tryout.laporan-pembayaran');

    Route::get('/peserta/kartu-tryout', [PesertaController::class, 'kartuTryout'])->name('peserta.kartu-tryout');
    Route::get('/peserta/cara-pembayaran/{bank?}', [PesertaController::class, 'caraPembayaran'])->name('peserta.cara-pembayaran');

    Route::resource('pendaftaran-tryout', PendaftaranTryoutController::class);
});
