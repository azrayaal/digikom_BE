<?php

use App\Http\Controllers\HtmlController;
use App\Http\Controllers\IuranController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::middleware(['auth:admin'])->group(function () {
    Route::resource('/', \App\Http\Controllers\IndexController::class);
    Route::resource('/iuran', \App\Http\Controllers\IuranController::class);
    Route::get('/tagihan/{id}', [IuranController::class, 'showTagihan'])->name('tagihan.show');

    Route::get('/laporan-iuran', [IuranController::class, 'laporanIuran'])->name('iuran.tagihan');
    Route::resource('/berita', \App\Http\Controllers\BeritaController::class);
    Route::resource('/kegiatan', \App\Http\Controllers\KegiatanController::class);
    Route::resource('/anggaran-dasar', \App\Http\Controllers\AnggaranDasarController::class);
    Route::resource('/anggaran-rumah-tangga', \App\Http\Controllers\AnggaranRumahTanggaController::class);
    Route::resource('/peraturan-organisasi', \App\Http\Controllers\PeraturanOrganisasiController::class);
    Route::resource('/jabatan', \App\Http\Controllers\JabatanController::class);
    Route::post('/anggota/toggle-suspend/{id}', [UserController::class, 'toggleSuspend'])->name('anggota.toggleSuspend');

    Route::resource('/anggota', \App\Http\Controllers\UserController::class);
    Route::resource('/pengurus', \App\Http\Controllers\PengurusController::class);
    Route::resource('/usaha', \App\Http\Controllers\UsahaController::class);
    Route::get('/iuran/{id}/enroll', [IuranController::class, 'enrollTagihan'])->name('iuran.enroll');
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

