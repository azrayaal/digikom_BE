<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tagihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\IuranResource;
use App\Models\Iuran;
use Tymon\JWTAuth\Facades\JWTAuth;

class TagihanController extends Controller
{
    public function index()
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
    
            $iurans = Iuran::with(['tagihans' => function ($query) use ($user) {
                $query->where('user_id', $user->id);
            }])->get();
    
            $result = $iurans->map(function ($iuran) use ($user) {
                $tagihan = $iuran->tagihans->first();
                return [
                    'iuran_id' => $iuran->id,
                    'bulan' => $iuran->bulan,
                    'jumlah' => $iuran->jumlah,
                    'status' => $tagihan ? $tagihan->status : 'Belum Lunas',
                    'tanggal_bayar' => $tagihan ? $tagihan->tanggal_bayar : 'Belum Dibayar',
                    'nominal' => $tagihan ? $tagihan->nominal : 0,
                ];
            });
    
            return response()->json([
                'success' => true,
                'message' => 'List Data Iuran',
                'data' => $result,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch data',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    

    public function show($id)
    {
        try {
            // Ambil user yang sedang login
            $user = JWTAuth::parseToken()->authenticate();
    
            // Cari iuran berdasarkan ID dan sertakan informasi tagihan user terkait
            $iuran = Iuran::with(['tagihans' => function ($query) use ($user) {
                $query->where('user_id', $user->id);
            }])->find($id);
    
            // Jika iuran tidak ditemukan
            if (!$iuran) {
                return response()->json([
                    'success' => false,
                    'message' => 'Iuran tidak ditemukan',
                ], 404);
            }
    
            // Ambil tagihan terkait user yang sedang login
            $tagihan = $iuran->tagihans->first();
    
            // Format data iuran beserta status pembayaran
            $result = [
                'iuran_id' => $iuran->id,
                'bulan' => $iuran->bulan,
                'jumlah' => $iuran->jumlah,
                'status' => $tagihan ? $tagihan->status : 'Belum Lunas',
                'tanggal_bayar' => $tagihan ? $tagihan->tanggal_bayar : 'Belum Dibayar',
                'nominal' => $tagihan ? $tagihan->nominal : 0,
            ];
    
            // Return response
            return response()->json([
                'success' => true,
                'message' => 'Detail Data Iuran',
                'data' => $result,
            ], 200);
        } catch (\Exception $e) {
            // Tangkap error jika ada
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch data',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    
    public function store(Request $request)
{
    try {
        // Ambil user yang sedang login
        $user = JWTAuth::parseToken()->authenticate();

        // Validasi input
        $request->validate([
            'iuran_id' => 'required|exists:iurans,id', // Pastikan iuran_id ada di tabel iurans
            'nominal' => 'required|integer|min:0',
            'metode_pembayaran' => 'nullable|string|max:255',
        ]);

        // Cek apakah user sudah membayar iuran ini
        $existingTagihan = Tagihan::where('user_id', $user->id)
            ->where('iuran_id', $request->iuran_id)
            ->first();

        if ($existingTagihan) {
            return response()->json([
                'success' => false,
                'message' => 'Tagihan sudah berhasil dibayarkan',
            ], 400);
        }

        // Buat tagihan baru
        $tagihan = Tagihan::create([
            'user_id' => $user->id,
            'iuran_id' => $request->iuran_id,
            'status' => 'Lunas', // Status awal
            'nominal' => $request->nominal,
            'metode_pembayaran' => $request->metode_pembayaran,
            'tanggal_bayar' => now(), // Belum dibayar
            'created_at' => now(),
        ]);

        // Return response sukses
        return response()->json([
            'success' => true,
            'message' => 'Transaksi berhasil',
            'data' => $tagihan,
        ], 201);
    } catch (\Exception $e) {
        // Tangkap dan return error
        return response()->json([
            'success' => false,
            'message' => 'Transaksi gagal',
            'error' => $e->getMessage(),
        ], 500);
    }
}

}
