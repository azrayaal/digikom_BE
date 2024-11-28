<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::apiResource('/user', App\Http\Controllers\Api\UserController::class);

Route::apiResource('/berita', App\Http\Controllers\Api\BeritaController::class);

Route::apiResource('/admin', App\Http\Controllers\Api\AdminController::class);
 