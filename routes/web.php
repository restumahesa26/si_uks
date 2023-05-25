<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PemeriksaanController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('data-siswa', SiswaController::class);
    Route::resource('data-obat', ObatController::class);
    Route::resource('pemeriksaan', PemeriksaanController::class);
    Route::resource('data-petugas', PetugasController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/cetak-bulan-ini', [LaporanController::class, 'print_bulan_ini'])->name('laporan.cetak-bulan-ini');
    Route::get('/laporan/cetak-berdasarkan-bulan', [LaporanController::class, 'print_bulan'])->name('laporan.cetak-bulan');
    Route::get('/laporan/cetak-semua', [LaporanController::class, 'print'])->name('laporan.cetak');
});

require __DIR__.'/auth.php';
