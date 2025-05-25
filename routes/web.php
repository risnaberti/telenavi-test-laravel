<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

require('auth.php');

/*
 * Tidak bisa diakses jika sudah login.
 */
Route::middleware('guest')->group(function () {
    Route::get('/', [LandingController::class, 'index'])->name('landing');
});

/*
 * Perlu login untuk mengakses
 */
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::resource('todo', TodoController::class);