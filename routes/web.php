<?php

use App\Http\Controllers\HtmlController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::middleware(['auth:admin'])->group(function () {
    Route::resource('/', \App\Http\Controllers\IndexController::class);
    Route::resource('/iuran', \App\Http\Controllers\IuranController::class);
    Route::resource('/berita', \App\Http\Controllers\BeritaController::class);
    Route::resource('/kegiatan', \App\Http\Controllers\KegiatanController::class);
    Route::resource('/anggaran-dasar', \App\Http\Controllers\AnggaranDasarController::class);
    Route::resource('/anggaran-rumah-tangga', \App\Http\Controllers\AnggaranRumahTanggaController::class);
    Route::resource('/peraturan-organisasi', \App\Http\Controllers\PeraturanOrganisasiController::class);
    Route::resource('/jabatan', \App\Http\Controllers\JabatanController::class);

    Route::resource('/anggota', \App\Http\Controllers\UserController::class);
    Route::resource('/pengurus', \App\Http\Controllers\PengurusController::class);
    Route::resource('/usaha', \App\Http\Controllers\UsahaController::class);
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/peraturanOrganisasi', [HtmlController::class, 'indexPeraturanOrganisasi'])->name('peraturanOrganisasi');
Route::get('/anggaranDasar', [HtmlController::class, 'indexAnggaranDasar'])->name('anggaranDasar');
Route::get('/anggaranRumahTangga', [HtmlController::class, 'indexAnggaranRumahTangga'])->name('anggaranRumahTangga');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/test-log', function () {
    try {
        \Log::info('Test log entry');
        return 'Log successfully written!';
    } catch (\Exception $e) {
        return $e->getMessage();
    }
});

