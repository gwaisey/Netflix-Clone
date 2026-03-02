<?php

use Illuminate\Support\Facades\Route;
// 1. PASTIKAN LINE INI ADA agar Route bisa mengenali MovieController
use App\Http\Controllers\MovieController;

// 2. Route untuk halaman utama (langsung muncul katalog Netflix)
Route::get('/', [MovieController::class, 'index']);

// 3. Route untuk CRUD Movies
Route::get('/movies', [MovieController::class, 'index']);           // Menampilkan Daftar
Route::get('/movies/create', [MovieController::class, 'create']);    // Form Tambah
Route::post('/movies', [MovieController::class, 'store']);           // Proses Simpan
Route::get('/movies/{id}/edit', [MovieController::class, 'edit']);   // Form Edit
Route::patch('/movies/{id}', [MovieController::class, 'update']);    // Proses Update
Route::delete('/movies/{id}', [MovieController::class, 'destroy']);  // Proses Hapus
Route::get('/movies/{id}', [MovieController::class, 'show']);

use App\Http\Controllers\AuthController;
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);