<?php

use App\Http\Controllers\Api\UsahaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\BeritaController;
use App\Http\Controllers\Api\KegiatanController;
use App\Http\Controllers\Api\IuranController;
use App\Http\Controllers\Api\AnggaranDasarController;
use App\Http\Controllers\Api\AnggaranRumahTanggaController;
use App\Http\Controllers\Api\PeraturanOrganisasiController;
use App\Http\Controllers\Api\PengurusController;
use App\Http\Controllers\Api\UsahaAnggotaController;
use App\Http\Controllers\Api\PendidikanController;
use App\Http\Controllers\Api\AgamaController;
use App\Http\Controllers\Api\PekerjaanController;

Route::post('/auth/logout', App\Http\Controllers\Api\LogoutController::class)->middleware('jwt.auth')->name('logout');
Route::post('/auth/login', App\Http\Controllers\Api\LoginController::class)->name('login');
Route::post('/auth/register', [RegisterController::class, 'register']);
Route::delete('/auth/user/{id}', [RegisterController::class, 'destroy']);

Route::middleware(['jwt.auth'])->group(function () {
    Route::apiResource('/user', UserController::class);
    Route::post('/user/edit-profile', [UserController::class, 'update']);
    // ubah agar tidak menggunakan route post
    Route::apiResource('/usaha', UsahaController::class);
    Route::apiResource('/berita', BeritaController::class);
    Route::apiResource('/kegiatan', KegiatanController::class);
    Route::apiResource('/iuran', IuranController::class);
    Route::apiResource('/anggaran-dasar', AnggaranDasarController::class);
    Route::apiResource('/anggaran-rumah-tangga', AnggaranRumahTanggaController::class);
    Route::apiResource('/peraturan-organisasi', PeraturanOrganisasiController::class);
    Route::apiResource('/pengurus', PengurusController::class);
    Route::apiResource('/usaha-anggota', UsahaAnggotaController::class);
    Route::apiResource('/pendidikan', PendidikanController::class);
    Route::apiResource('/agama', AgamaController::class);
    Route::apiResource('/pekerjaan', PekerjaanController::class);
});