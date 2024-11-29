<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

//import model product
use App\Models\Kegiatan; 
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

//import return type View
use Illuminate\View\View;

class KegiatanController extends Controller
{
    public function index() : View
    {
        //get all productsphp artisan serve

        $kegiatan = Kegiatan::latest()->paginate(10);
        Log::info('Kegiatan:', ['data' => $kegiatan]);
        //render view with products
        return view('pages.kegiatan.index', compact('kegiatan'));
    }


    public function show($id)
    {
        $kegiatan = Kegiatan::with('creator')->findOrFail($id); // Ambil kegiatan berdasarkan ID
        return view('pages.kegiatan.show', compact('kegiatan'));
    }

     // Menampilkan form untuk membuat kegiatan baru
    public function create()
    { 
            return view('pages.kegiatan.create');
    }

     // Menyimpan kegiatan baru
    public function store(Request $request)
    {
         // Validasi input
        $request->validate([
            'nama_kegiatan' => 'required|max:255',
            'tanggal_kegiatan' => 'required',
            'waktu_kegiatan' => 'required',
            'lokasi_kegiatan' => 'required',
            'deskripsi_kegiatan' => 'required',
        ]);

         // Menyimpan data kegiatan ke database
        $kegiatan = new Kegiatan;
        $kegiatan->nama_kegiatan = $request->nama_kegiatan;
        $kegiatan->tanggal_kegiatan = $request->tanggal_kegiatan;
        $kegiatan->waktu_kegiatan = $request->waktu_kegiatan;
        $kegiatan->lokasi_kegiatan = $request->lokasi_kegiatan;
        $kegiatan->deskripsi_kegiatan = $request->deskripsi_kegiatan;
        //  $kegiatan->created_by = auth()->id();  // Menyimpan ID admin yang membuat kegiatan
        $kegiatan->created_by = 1;  
        $kegiatan->save();
         // Redirect setelah berhasil menyimpan
        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil dibuat!');
    }

    public function edit($id)
    {
        $kegiatan = Kegiatan::findOrFail($id); // Ambil kegiatan berdasarkan ID
        return view('pages.kegiatan.edit', compact('kegiatan'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_kegiatan' => 'required|max:255',
            'tanggal_kegiatan' => 'required',
            'waktu_kegiatan' => 'required',
            'lokasi_kegiatan' => 'required',
            'deskripsi_kegiatan' => 'required',
        ]);
        // Cari kegiatan berdasarkan ID
        $kegiatan = Kegiatan::findOrFail($id);

        // Update data kegiatan
        $kegiatan->nama_kegiatan = $request->nama_kegiatan;
        $kegiatan->tanggal_kegiatan = $request->tanggal_kegiatan;
        $kegiatan->waktu_kegiatan = $request->waktu_kegiatan;
        $kegiatan->lokasi_kegiatan = $request->lokasi_kegiatan;
        $kegiatan->deskripsi_kegiatan = $request->deskripsi_kegiatan;
        $kegiatan->created_by = 1;  
        $kegiatan->save();

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $kegiatan = Kegiatan::findOrFail($id); // Ambil kegiatan berdasarkan ID

        $kegiatan->delete(); // Hapus data kegiatan

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil dihapus!');
    }
}
