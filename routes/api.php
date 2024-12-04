<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/logout', App\Http\Controllers\Api\LogoutController::class)->middleware('jwt.auth')->name('logout');
Route::post('/login', App\Http\Controllers\Api\LoginController::class)->name('login');

Route::middleware(['jwt.auth'])->group(function () {
    Route::apiResource('/user', App\Http\Controllers\Api\UserController::class);
    Route::apiResource('/berita', App\Http\Controllers\Api\BeritaController::class);
    Route::apiResource('/kegiatan', App\Http\Controllers\Api\KegiatanController::class);
    Route::apiResource('/iuran', App\Http\Controllers\Api\IuranController::class);
    Route::apiResource('/anggaran-dasar', App\Http\Controllers\Api\AnggaranDasarController::class);
    Route::apiResource('/anggaran-rumah-tangga', App\Http\Controllers\Api\AnggaranRumahTanggaController::class);
    Route::apiResource('/peraturan-organisasi', App\Http\Controllers\Api\PeraturanOrganisasiController::class);
    Route::apiResource('/pengurus', App\Http\Controllers\Api\PengurusController::class);
    Route::apiResource('/usaha-anggota', App\Http\Controllers\Api\UsahaAnggotaController::class);
    Route::apiResource('/pendidikan', App\Http\Controllers\Api\PendidikanController::class);
    Route::apiResource('/agama', App\Http\Controllers\Api\AgamaController::class);
    Route::apiResource('/pekerjaan', App\Http\Controllers\Api\PekerjaanController::class);
});


