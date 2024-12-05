<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Resources\UserResource;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        \Log::info('Register request received.', $request->all());
    
        try {
            // Validasi input
            $request->validate([
                'full_name' => 'required|string|max:255',
                'email' => 'required|string|email|unique:users,email',
                'password' => 'required|string|min:6',
                'phone_number' => 'required|string|max:15',
                'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'nomor_ktp' => 'required|string|max:50',
                'tanggal_lahir' => 'required|date',
                'tempat_lahir' => 'required|string|max:100',
                'alamat' => 'required|string|max:255',
                'pekerjaan_id' => 'required|integer',
                'jabatan_id' => 'required|integer',
                'agama_id' => 'required|integer',
                'pendidikan_id' => 'required|integer',
            ]);
    
            // Proses penyimpanan file
            $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
    
            // Proses penyimpanan data user
            $user = User::create([
                'full_name' => $request->full_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone_number' => $request->phone_number,
                'profile_picture' => $profilePicturePath,
                'nomor_ktp' => $request->nomor_ktp,
                'tanggal_lahir' => $request->tanggal_lahir,
                'tempat_lahir' => $request->tempat_lahir,
                'alamat' => $request->alamat,
                'pekerjaan_id' => $request->pekerjaan_id,
                'jabatan_id' => $request->jabatan_id,
                'agama_id' => $request->agama_id,
                'pendidikan_id' => $request->pendidikan_id,
            ]);
    
                return new UserResource(true, 'User Registered Successfully', $user);
            
        } catch (\Exception $e) {
            \Log::error('Error during registration: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to register user',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    
}
