<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;

class LogoutController extends Controller
{
    public function __invoke(Request $request)
    {
        try {
            JWTAuth::invalidate(JWTAuth::getToken());

            return response()->json([
                'message' => 'Logout berhasil!'
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Logout gagal. Token tidak valid.'
            ], 401);
        }
    }
}
