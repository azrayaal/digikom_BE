<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    public function index()
    {
        try {
            // Ambil data user yang sedang login
            $user = JWTAuth::parseToken()->authenticate();

            // Return data user sebagai resource
            return new UserResource(true, 'Data Profile', $user);
        } catch (\Exception $e) {
            // Jika terjadi error (contohnya token invalid atau expired)
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve user data',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
