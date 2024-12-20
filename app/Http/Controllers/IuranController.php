<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//import model product
use App\Models\Iuran; 
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

//import return type View
use Illuminate\View\View;

class IuranController extends Controller
{
    public function index(Request $request) : View
    {
        // Ambil input untuk search dan sort
        $search = $request->input('search');
        $sortBy = $request->input('sort_by', 'bulan'); // Default sort by 'bulan'
        $order = $request->input('order', 'asc'); // Default order 'asc'
        $perPage = $request->input('per_page', 10);
        // Query dengan pencarian dan pengurutan
        $iuran = Iuran::when($search, function ($query, $search) {
                return $query->where('bulan', 'like', "%{$search}%")
                            ->orWhere('jumlah', 'like', "%{$search}%");
            })
            ->orderBy($sortBy, $order)
            ->paginate($perPage);
    
        return view('pages.iuran.index', compact('iuran', 'search', 'sortBy', 'order'));
    }


    public function show($id)
    {
        $iuran = Iuran::with('creator')->findOrFail($id); // Ambil iuran berdasarkan ID
        return view('pages.iuran.show', compact('iuran'));
    }

     // Menampilkan form untuk membuat iuran baru
    public function create()
    { 
            return view('pages.iuran.create');
    }

     // Menyimpan iuran baru
    public function store(Request $request)
    {
         // Validasi input
        $request->validate([
            'bulan' => 'required|unique:iurans,bulan',
            'jumlah' => 'required',
            'keterangan' => 'required',
        ]);

         // Menyimpan data iuran ke database
        $iuran = new Iuran;
        $iuran->bulan = $request->bulan;
        $iuran->jumlah = $request->jumlah;
        $iuran->keterangan = $request->keterangan;
        $iuran->created_by = Auth::guard('admin')->user()->id; 
        $iuran->save();
         // Redirect setelah berhasil menyimpan
        return redirect()->route('iuran.index')->with('success', 'Iuran berhasil dibuat!');
    }

    public function edit($id)
    {
        $iuran = Iuran::findOrFail($id); // Ambil iuran berdasarkan ID
        return view('pages.iuran.edit', compact('iuran'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'bulan' => 'required|max:255',
            'jumlah' => 'required',
            'keterangan' => 'required',
        ]);
        // Cari iuran berdasarkan ID
        $iuran = Iuran::findOrFail($id);

            // Menyimpan data iuran ke database
            $iuran->bulan = $request->bulan;
            $iuran->jumlah = $request->jumlah;
            $iuran->keterangan = $request->keterangan;
            $iuran->created_by = Auth::guard('admin')->user()->id; 
            $iuran->save();

        return redirect()->route('iuran.index')->with('success', 'Iuran berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $iuran = Iuran::findOrFail($id); // Ambil iuran berdasarkan ID

        $iuran->delete(); // Hapus data iuran

        return redirect()->route('iuran.index')->with('success', 'Iuran berhasil dihapus!');
    }
}
