<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PenanggungjawabController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController; // Jangan lupa import controller profil
use App\Models\Inventaris;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register-progress', [RegisterController::class, 'progress'])->name('register.progress');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login-progress', [LoginController::class, 'progress'])->name('login.progress');

Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
//    Route::get('/anggota/dashboard', [UserController::class, 'index'])->name('anggota.dashboard');
//    Route::get('/anggota/dashboard', [UserController::class, 'index'])->middleware('role:2');


    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Routes Karyawan
    Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan');
    Route::get('/karyawan/create', [KaryawanController::class, 'create'])->name('karyawan.create');
    Route::post('/karyawan/store', [KaryawanController::class, 'store'])->name('karyawan.store');
    Route::get('/karyawan/{id_karyawan}/edit', [KaryawanController::class, 'edit'])->name('karyawan.edit');
    Route::put('/karyawan/{id_karyawan}', [KaryawanController::class, 'update'])->name('karyawan.update');
    Route::delete('/karyawan/{id_karyawan}', [KaryawanController::class, 'destroy'])->name('karyawan.destroy');

    // Routes Peminjaman
    Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman');
    Route::post('/peminjaman', [PeminjamanController::class, 'store'])->name('peminjaman.store');
    Route::post('/peminjaman/{id}/kembalikan', [PeminjamanController::class, 'updateStatus'])->name('peminjaman.kembalikan');

    // Routes Inventaris
    Route::get('/inventaris', [InventarisController::class, 'index'])->name('inventaris');
    Route::get('/inventaris/create', [InventarisController::class, 'create'])->name('inventaris.create');
    Route::post('/inventaris/store', [InventarisController::class, 'store'])->name('inventaris.store');
    Route::get('/inventaris/{id_inventaris}/edit', [InventarisController::class, 'edit'])->name('inventaris.edit');
    Route::put('/inventaris/{id_inventaris}', [InventarisController::class, 'update'])->name('inventaris.update');
    Route::delete('/inventaris/{id_inventaris}', [InventarisController::class, 'destroy'])->name('inventaris.destroy');

    // Tambahkan routes Profil & Ganti Password
    Route::get('/profile/settings', [ProfileController::class, 'settings'])->name('profile.settings');
    Route::post('/profile/settings/password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');
});

// Untuk user yang sudah login (role anggota)
Route::middleware(['auth'])->prefix('anggota')->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('anggota.dashboard');
    Route::get('/profile', [UserController::class, 'profile'])->name('anggota.profile');
    Route::post('/profile/update', [UserController::class, 'profileUpdate'])->name('anggota.profile.update');
    Route::get('/user/{slug}', [UserController::class, 'show'])->name('anggota.user.show');
});

  
