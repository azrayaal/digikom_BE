<?php

use Illuminate\Support\Facades\Route;


Route::resource('/dashboard', \App\Http\Controllers\IndexController::class);
Route::resource('/iuran', \App\Http\Controllers\IuranController::class);
Route::resource('/berita', \App\Http\Controllers\BeritaController::class);
Route::resource('/kegiatan', \App\Http\Controllers\KegiatanController::class);
Route::resource('/anggaran-dasar', \App\Http\Controllers\AnggaranDasarController::class);
Route::resource('/anggaran-rumah-tangga', \App\Http\Controllers\AnggaranRumahTanggaController::class);
Route::resource('/peraturan-organisasi', \App\Http\Controllers\PeraturanOrganisasiController::class);
Route::resource('/jabatan', \App\Http\Controllers\JabatanController::class);

Route::resource('/anggota', \App\Http\Controllers\UserController::class);
Route::resource('/pengurus', \App\Http\Controllers\JabatanController::class);
Route::resource('/usaha-anggota', \App\Http\Controllers\JabatanController::class);