<?php

use Illuminate\Support\Facades\Route;


Route::resource('/', \App\Http\Controllers\IndexController::class);
Route::resource('/berita', \App\Http\Controllers\BeritaController::class);
Route::resource('/kegiatan', \App\Http\Controllers\KegiatanController::class);
Route::resource('/iuran', \App\Http\Controllers\IuranController::class);
