<?php
namespace App\Http\Controllers\Api\Pembayaran;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Tymon\JWTAuth\Facades\JWTAuth;

class PembayaranCardController extends Controller
{
    public function bayarCard(Request $request)
    {
        try {
            // Validasi input
            $validated = $request->validate([
                'nominal' => 'required|numeric|min:1',
                'token' => 'required|string',
                'auth' => 'required|string',
                'cvn' => 'required|string',
                'metode_pembayaran' => 'required|string|in:ID_CREDIT_CARD',
                'iuran_id' => 'required|integer',
                'keterangan' => 'nullable|string|max:255',
            ]);

            // Ambil user dari token JWT
            $user = JWTAuth::parseToken()->authenticate();

            // Buat ID Transaksi unik
            $id_transaksi = 'DGX' . now()->format('YmdHis') . $validated['iuran_id'];
            $nominal = $validated['nominal'];
            $token = $validated['token'];
            $auth = $validated['auth'];
            $cvn = $validated['cvn'];

            // Hitung total bayar termasuk biaya admin jika ada
            $t_bayar = $nominal; // Jika ada biaya admin, tambahkan di sini

            // Konfigurasi payload untuk pembayaran kartu kredit
            $payload = [
                "token_id" => $token,
                "external_id" => $id_transaksi,
                "amount" => $t_bayar,
                "authentication_id" => $auth,
                "card_cvn" => $cvn,
            ];

            Log::channel('single')->debug('Payload untuk API Xendit Card', $payload);

            // Kirim permintaan ke API Xendit menggunakan Http:: (Laravel)
            $response = Http::timeout(30)  // Timeout 30 detik
                ->withBasicAuth(config('services.xendit.api_key'), '')
                ->withHeaders([  // Menambahkan headers kustom
                    'Authorization' => 'Basic ' . base64_encode(config('services.xendit.api_key') . ':'),
                    'for-user-id' => '65694e8b303521a8abfbd7db',  // Gunakan ID pengguna terautentikasi
                    'Content-Type' => 'application/json',
                ])
                ->post('https://api.xendit.co/credit_card_charges', $payload);

            // Log status dan respons
            Log::channel('single')->info('Status respons dari API Xendit', [
                'status_code' => $response->status(),
                'response_body' => $response->body(),
            ]);

            // Cek jika request gagal
            if ($response->failed()) {
                Log::channel('single')->error('Gagal memproses pembayaran', [
                    'status' => $response->status(),
                    'error_message' => $response->body(),
                    'response' => $response->json(),
                ]);
                return response()->json([
                    'status' => 'error',
                    'message' => 'Gagal memproses pembayaran.',
                    'details' => $response->json(),
                ], 400);
            }

            // Ambil respons JSON dari Xendit
            $json = $response->json();
            Log::channel('single')->info('Transaksi berhasil diproses', $json);

            // Simpan transaksi ke database
            DB::table('tagihan')->insert([
                'user_id' => $user->id,
                'iuran_id' => $validated['iuran_id'],
                'status' => 'Belum Lunas',
                'tanggal_bayar' => null,
                'nominal' => $nominal,
                'metode_pembayaran' => $validated['metode_pembayaran'],
                'keterangan' => $validated['keterangan'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            Log::channel('single')->info('Transaksi berhasil disimpan', ['user_id' => $user->id, 'id_transaksi' => $id_transaksi]);

            return response()->json([
                'status' => 'success',
                'message' => 'Transaksi berhasil diproses.',
                'data' => [
                    'id' => $json['id'],
                    'status' => $json['status'],
                    'metode_pembayaran' => $validated['metode_pembayaran'],
                ],
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::channel('single')->error('Validasi gagal', ['errors' => $e->errors()]);
            return response()->json([
                'status' => 'error',
                'message' => 'Validasi gagal.',
                'details' => $e->errors(),
            ], 422);
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            Log::channel('single')->error('JWT error', ['message' => $e->getMessage()]);
            return response()->json([
                'status' => 'error',
                'message' => 'Token tidak valid.',
                'details' => $e->getMessage(),
            ], 401);
        } catch (\Exception $e) {
            Log::channel('single')->error('Kesalahan server', ['exception' => $e->getMessage()]);
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan.',
                'details' => $e->getMessage(),
            ], 500);
        }
    }
}
