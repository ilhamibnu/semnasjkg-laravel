<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SemnasController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [IndexController::class, 'index']);

# Auth
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout']);

# Logged in
Route::get('/seminar', [SemnasController::class, 'index'])->middleware('IsLogin');
Route::post('/pendaftaran', [IndexController::class, 'pendafaran'])->middleware('IsLogin');
Route::delete('/hapus-seminar/{id}', [SemnasController::class, 'destroy'])->middleware('IsLogin');
