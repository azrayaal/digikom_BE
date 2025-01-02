<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Iuran;
use App\Models\User;
use App\Models\Tagihan; // Pastikan model Tagihan diimpor
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class IuranController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->input('search');
        $sortBy = $request->input('sort_by', 'tahun'); // Default sort by 'tahun'
        $order = $request->input('order', 'asc'); // Default order 'asc'
        $perPage = $request->input('per_page', 10);

        $iuran = Iuran::when($search, function ($query, $search) {
                return $query->where('tahun', 'like', "%{$search}%")
                            ->orWhere('jumlah', 'like', "%{$search}%");
            })
            ->orderBy($sortBy, $order)
            ->paginate($perPage);
    
        return view('pages.iuran.index', compact('iuran', 'search', 'sortBy', 'order'));
    }

    public function show($id)
    {
        $iuran = Iuran::with('creator')->findOrFail($id);
        return view('pages.iuran.show', compact('iuran'));
    }

    public function create()
    { 
        return view('pages.iuran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required|unique:iurans,tahun',
            'jumlah' => 'required',
            'keterangan' => 'required',
        ]);

        $iuran = new Iuran;
        $iuran->tahun = $request->tahun;
        $iuran->jumlah = $request->jumlah;
        $iuran->keterangan = $request->keterangan;
        $iuran->created_by = Auth::guard('admin')->user()->id;
        $iuran->save();

        return redirect()->route('iuran.index')->with('success', 'Iuran berhasil dibuat!');
    }

    public function edit($id)
    {
        $iuran = Iuran::findOrFail($id);
        return view('pages.iuran.edit', compact('iuran'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tahun' => 'required|max:255',
            'jumlah' => 'required',
            'keterangan' => 'required',
        ]);

        $iuran = Iuran::findOrFail($id);
        $iuran->tahun = $request->tahun;
        $iuran->jumlah = $request->jumlah;
        $iuran->keterangan = $request->keterangan;
        $iuran->created_by = Auth::guard('admin')->user()->id;
        $iuran->save();

        return redirect()->route('iuran.index')->with('success', 'Iuran berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $iuran = Iuran::findOrFail($id);
        $iuran->delete();

        return redirect()->route('iuran.index')->with('success', 'Iuran berhasil dihapus!');
    }

   /**
 * Enroll tagihan dari iuran untuk bulan Januari hingga Desember.
 */
public function enrollTagihan($id)
{
    try {
        // Cari iuran berdasarkan ID
        $iuran = Iuran::findOrFail($id);

        // Log untuk memastikan iuran ditemukan
        \Log::info('Iuran found', ['iuran_id' => $iuran->id]);

        // Ambil semua user yang aktif
        $users = User::where('status', 'aktif')->get();

        // Log untuk memastikan pengguna ditemukan
        \Log::info('Users found', ['user_count' => $users->count()]);

        $tahun = $iuran->tahun; 
        $bulan = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        foreach ($users as $user) {
            foreach ($bulan as $index => $namaBulan) {
                // Cek apakah tagihan untuk user, bulan, dan tahun ini sudah ada
                $existingTagihan = Tagihan::where('user_id', $user->id)
                    ->where('iuran_id', $iuran->id)
                    ->whereYear('created_at', $tahun)
                    ->whereMonth('created_at', $index + 1)
                    ->exists();

                if (!$existingTagihan) {
                    // Jika belum ada, buat tagihan baru
                    $tagihan = new Tagihan;
                    $tagihan->user_id = $user->id;
                    $tagihan->iuran_id = $iuran->id;
                    $tagihan->nominal = $iuran->jumlah;
                    $tagihan->keterangan = $namaBulan;
                    $tagihan->status = 'Belum Lunas';

                    // Setting created_at and updated_at for specific month/year
                    $tagihan->created_at = \Carbon\Carbon::create($tahun, $index + 1, 1);
                    $tagihan->updated_at = \Carbon\Carbon::create($tahun, $index + 1, 1);

                    // Log before saving
                    \Log::info('Saving tagihan', [
                        'user_id' => $user->id,
                        'iuran_id' => $iuran->id,
                        'nominal' => $tagihan->nominal,
                        'bulan' => $namaBulan,
                    ]);

                    // Save the tagihan to the database
                    $tagihan->save();

                    // Log after saving
                    \Log::info('Tagihan saved successfully', [
                        'user_id' => $tagihan->user_id,
                        'iuran_id' => $tagihan->iuran_id,
                        'nominal' => $tagihan->nominal,
                    ]);
                } else {
                    // If tagihan already exists, display warning
                    \Log::warning('Tagihan already exists', [
                        'user_id' => $user->id,
                        'iuran_id' => $iuran->id,
                        'bulan' => $namaBulan,
                    ]);

                    // Redirect with warning
                    return redirect()->route('iuran.index')->with('warning', 'Tagihan untuk tahun ' . $tahun . ' dan bulan ' . $namaBulan . ' sudah ada.');
                }
            }
        }

        // Redirect to the index with success message
        return redirect()->route('iuran.index')->with('success', 'Tagihan berhasil dienroll untuk iuran ini!');
    } catch (\Exception $e) {
        // Log error
        \Log::error('Error enrolling tagihan: ' . $e->getMessage(), [
            'exception' => $e,
        ]);

        // Redirect with error message
        return redirect()->route('iuran.index')->with('error', 'Terjadi kesalahan saat menambahkan tagihan.');
    }
}


        public function laporanIuran(Request $request)
        {
            $search = $request->input('search');
            $year = $request->input('year');
            $month = $request->input('month');
            $userId = $request->input('user_id');
            $sortBy = $request->input('sort_by', 'created_at');  // Change to 'created_at' or another column
            $order = $request->input('order', 'asc');
            $perPage = $request->input('per_page', 10);
            
            // Build the query
            $iuran = Tagihan::query();
            $years = Iuran::select('tahun')->distinct()->pluck('tahun')->sort();

            if ($search) {
                $iuran->where('tahun', 'like', "%{$search}%")
                    ->orWhere('jumlah', 'like', "%{$search}%")
                    ->orWhereHas('user', function ($query) use ($search) {
                        $query->where('full_name', 'like', "%{$search}%");
                    });
            }
        
            if ($year) {
                $iuran->where('tahun', $year);
            }
        
            if ($month) {
                $iuran->whereMonth('created_at', $month);
            }
        
            if ($userId) {
                $iuran->where('user_id', $userId);
            }
        
            // Sort by the selected column (either 'created_at' or 'tahun' if it exists)
            // Pada query laporanIuran
           // Menggunakan eager loading untuk mengoptimalkan performa
                $iuran = Tagihan::with('iuran') // Pastikan relasi iuran sudah didefinisikan
                ->when($search, function($query) use ($search) {
                    $query->where('jumlah', 'like', "%{$search}%")
                        ->orWhereHas('user', function ($query) use ($search) {
                            $query->where('full_name', 'like', "%{$search}%");
                        });
                })
                ->when($year, function($query) use ($year) {
                    $query->whereHas('iuran', function ($query) use ($year) {
                        $query->where('tahun', $year);
                    });
                })
                ->when($month, function($query) use ($month) {
                    $query->whereMonth('created_at', $month);
                })
                ->when($userId, function($query) use ($userId) {
                    $query->where('user_id', $userId);
                })
                ->orderBy($sortBy, $order)
                ->paginate($perPage);

        
            // Pass the users for the filter dropdown
            $users = User::all();
        
            return view('pages.iuran.laporan', compact('iuran', 'users', 'search', 'year', 'month', 'userId', 'years'));
        }

        public function showTagihan($id)
{
    // Cari tagihan berdasarkan ID, bersama dengan relasi 'iuran' dan 'users'
    $tagihan = Tagihan::with(['iuran', 'users'])->findOrFail($id);

    // Tampilkan halaman show dengan data tagihan yang ditemukan
    return view('pages.iuran.laporanDetail', compact('tagihan'));
}

}