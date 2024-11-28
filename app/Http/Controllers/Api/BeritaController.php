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

    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'banner'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tittle'     => 'required|unique:beritas,tittle',
            'content'   => 'required',
            'created_by' => 'required|exists:users,id',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

         // Upload image
    if ($request->hasFile('banner')) {
        $image = $request->file('banner');
        $imagePath = $image->storeAs('public/berita', $image->hashName());

        \Log::info('Image Path: ' . $imagePath);
        \Log::info('Log test successful.');

    }

        //create post
        $berita = Berita::create([
            'banner'     => $image->hashName(),
            'tittle'     => $request->tittle,
            'content'   => $request->content,
            'created_by' => $request->created_by,
        ]);

        //return response
        return new BeritaResource(true, 'Data Post Berhasil Ditambahkan!', $berita);
    }
}
