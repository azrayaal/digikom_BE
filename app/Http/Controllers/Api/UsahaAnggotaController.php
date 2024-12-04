<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\UsahaAnggotaResource;
use App\Models\Usaha;

class UsahaAnggotaController extends Controller
{
    public function index()
    {
        //get all posts
        // $usahas = Usaha::latest()->paginate(5);
        $usahas = Usaha::with('creator')->latest()->get();
        //return collection of posts as a resource
        return new UsahaAnggotaResource(true, 'List Data Usaha', $usahas);
    }

    public function show($id)
    {
        // Mencari usaha berdasarkan ID
        $usaha = Usaha::with('creator')->find($id);

        // Jika usaha tidak ditemukan, return response error
        if (!$usaha) {
            return response()->json([
                'success' => false,
                'message' => 'Usaha tidak ditemukan',
            ], 404);
        }

        // Return data usaha
        return new UsahaAnggotaResource(true, 'Detail Data Usaha', $usaha);
    }

}
