<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\BeritaResource;
use App\Models\Berita;

class BeritaController extends Controller
{
    public function index()
    {
        //get all posts
        // $beritas = Berita::latest()->paginate(5);
        $beritas = Berita::with('creator')->latest()->paginate(5);
        //return collection of posts as a resource
        return new BeritaResource(true, 'List Data Berita', $beritas);
    }

    public function show($id)
    {
        // Mencari berita berdasarkan ID
        $berita = Berita::with('creator')->find($id);

        // Jika berita tidak ditemukan, return response error
        if (!$berita) {
            return response()->json([
                'success' => false,
                'message' => 'Berita tidak ditemukan',
            ], 404);
        }

        // Return data berita
        return new BeritaResource(true, 'Detail Data Berita', $berita);
    }

}
