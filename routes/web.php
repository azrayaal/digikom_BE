<?php

use Illuminate\Support\Facades\Route;


Route::resource('/', \App\Http\Controllers\IndexController::class);
Route::resource('/berita', \App\Http\Controllers\BeritaController::class);
Route::resource('/kegiatan', \App\Http\Controllers\KegiatanController::class);
Route::resource('/iuran', \App\Http\Controllers\IuranController::class);
Route::resource('/anggaran-dasar', \App\Http\Controllers\AnggaranDasarController::class);
Route::resource('/anggaran-rumah-tangga', \App\Http\Controllers\AnggaranRumahTanggaController::class);
Route::resource('/peraturan-organisasi', \App\Http\Controllers\PeraturanOrganisasiController::class);