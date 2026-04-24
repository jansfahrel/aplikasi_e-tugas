<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\PengumpulanController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\KelasController;

/*
|--------------------------------------------------------------------------
| WEB ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});


// ================= DASHBOARD DEFAULT =================
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


// ================= ADMIN =================
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

    Route::get('/users', [AdminUserController::class, 'users']);
    Route::get('/dosen', [AdminUserController::class, 'dosen']);
    Route::get('/mahasiswa', [AdminUserController::class, 'mahasiswa']);

    Route::post('/users/store', [AdminUserController::class, 'store']);
    Route::post('/users/delete/{id}', [AdminUserController::class, 'destroy']);
    Route::post('/users/update-role/{id}', [AdminUserController::class, 'updateRole']);
});


// ================= DOSEN =================
Route::middleware(['auth', 'role:dosen'])->prefix('dosen')->group(function () {

    // DASHBOARD
    Route::get('/dashboard', [TugasController::class, 'index']);

    // PROFILE
    Route::get('/profile', [ProfileController::class, 'edit']);
    Route::post('/profile/update', [ProfileController::class, 'update']);

    // KELAS
    Route::get('/kelas', [KelasController::class, 'index']);
    Route::post('/kelas/store', [KelasController::class, 'store']);
    Route::get('/kelas/{id}', [KelasController::class, 'show']);

    // TUGAS
    Route::post('/tugas/store/{kelas_id}', [TugasController::class, 'store']);
    Route::get('/tugas/{id}', [TugasController::class, 'detail']);

    Route::get('/tugas/{id}/edit', [TugasController::class, 'edit']);
    Route::post('/tugas/{id}/update', [TugasController::class, 'update']);

    Route::get('/tugas/{id}/hapus', [TugasController::class, 'destroy']);
});


// ================= MAHASISWA =================
Route::middleware(['auth', 'role:mahasiswa'])->prefix('mahasiswa')->group(function () {

    // DASHBOARD
    Route::get('/dashboard', [PengumpulanController::class, 'index']);

    // PROFILE
    Route::get('/profile', [ProfileController::class, 'edit']);
    Route::post('/profile/update', [ProfileController::class, 'update']);

    // KELAS
    Route::get('/kelas/{id}', [PengumpulanController::class, 'kelas']);

    // KUMPUL TUGAS
    Route::post('/kumpul', [PengumpulanController::class, 'store']);

    // JOIN KELAS
    Route::post('/join-kelas', [KelasController::class, 'join']);
});


// ================= AUTH =================
require __DIR__.'/auth.php';