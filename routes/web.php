<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PendaftaranTryoutController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'doLogin']);

    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'doRegister']);

    Route::get('/', [LandingController::class, 'index'])->name('landing');
    Route::post('/tryout/daftar', [PendaftaranTryoutController::class, 'daftar'])->name('tryout.daftar');
    Route::get('/tryout/info-login', [PendaftaranTryoutController::class, 'infoLogin'])->name('tryout.info-login');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::post('/profile', [AuthController::class, 'updateProfile']);

    Route::get('/change-password', [AuthController::class, 'change-password'])->name('change-password');
    Route::post('/change-password', [AuthController::class, 'doChangePassword']);

    // proses bisnis
    // Route::get('/tryout/daftar', [PendaftaranTryoutController::class, 'daftar']);

    Route::resource('pendaftaran-tryout', PendaftaranTryoutController::class);
});
