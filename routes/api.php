<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;


Route::post('/todo', [TodoController::class, 'store']);
Route::get('/todo/export', [TodoController::class, 'export']);
Route::get('/chart', [TodoController::class, 'chart']);
