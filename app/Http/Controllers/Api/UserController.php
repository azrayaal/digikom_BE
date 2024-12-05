<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
    public function update(Request $request, $id)
    {
        $request->validate([
            'full_name' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6',
            'phone_number' => 'nullable|string|max:15',
            'profile_picture' => 'nullable|string',
            'jabatan_id' => 'nullable|integer',
            'nomor_ktp' => 'nullable|string|max:50',
            'tanggal_lahir' => 'nullable|date',
            'tempat_lahir' => 'nullable|string|max:100',
            'alamat' => 'nullable|string|max:255',
            'pekerjaan_id' => 'nullable|integer',
            'agama_id' => 'nullable|integer',
            'pendidikan_id' => 'nullable|integer',
        ]);

        try {
            $user = JWTAuth::parseToken()->authenticate();
            $user = User::findOrFail($id);
            
            $user->update([
                'full_name' => $request->full_name ?? $user->full_name,
                'email' => $request->email ?? $user->email,
                'password' => $request->password ? Hash::make($request->password) : $user->password,
                'phone_number' => $request->phone_number ?? $user->phone_number,
                'profile_picture' => $request->profile_picture ?? $user->profile_picture,
                'jabatan_id' => $request->jabatan_id ?? $user->jabatan_id,
                'nomor_ktp' => $request->nomor_ktp ?? $user->nomor_ktp,
                'tanggal_lahir' => $request->tanggal_lahir ?? $user->tanggal_lahir,
                'tempat_lahir' => $request->tempat_lahir ?? $user->tempat_lahir,
                'alamat' => $request->alamat ?? $user->alamat,
                'pekerjaan_id' => $request->pekerjaan_id ?? $user->pekerjaan_id,
                'agama_id' => $request->agama_id ?? $user->agama_id,
                'pendidikan_id' => $request->pendidikan_id ?? $user->pendidikan_id,
            ]);

            return new UserResource(true, 'User Updated Successfully', $user);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update user',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
