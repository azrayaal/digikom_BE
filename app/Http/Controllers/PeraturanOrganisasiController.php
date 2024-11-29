<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

//import model product
use App\Models\Berita; 
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

//import return type View
use Illuminate\View\View;

class PeraturanOrganisasiController extends Controller
{
    public function index(Request $request) : View
    {
        $search = $request->input('search');
        $sortBy = $request->input('sort_by', 'tittle'); // Default sort by 'bulan'
        $order = $request->input('order', 'asc'); // Default order 'asc'
        $perPage = $request->input('per_page', 10);
        // Query dengan pencarian dan pengurutan
        $berita = Berita::when($search, function ($query, $search) {
                return $query->where('tittle', 'like', "%{$search}%");
            })
            ->orderBy($sortBy, $order)
            ->paginate($perPage);
    
        return view('pages.berita.index', compact('berita', 'search', 'sortBy', 'order'));
    }


    public function show($id)
    {
        $berita = Berita::with('creator')->findOrFail($id); // Ambil berita berdasarkan ID
        return view('pages.berita.show', compact('berita'));
    }

     // Menampilkan form untuk membuat berita baru
    public function create()
    {
        return view('pages.berita.create');
    }

     // Menyimpan berita baru
    public function store(Request $request)
    {
         // Validasi input
        $request->validate([
            'tittle' => 'required|unique:beritas,tittle',
            'banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content' => 'required',
        ]);

         // Menyimpan data berita ke database
        $berita = new Berita;
        $berita->tittle = $request->tittle;
        $berita->content = $request->content;
        //  $berita->created_by = auth()->id();  // Menyimpan ID admin yang membuat berita
        $berita->created_by = 1;  

         // Menyimpan banner gambar jika ada
        if ($request->hasFile('banner')) {
            $imagePath = $request->file('banner')->store('public/berita');
            $berita->banner = basename($imagePath);
        }

        $berita->save();

         // Redirect setelah berhasil menyimpan
        return redirect()->route('berita.index')->with('success', 'Berita berhasil dibuat!');
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id); // Ambil berita berdasarkan ID
        return view('pages.berita.edit', compact('berita'));
    }

    public function update(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'tittle' => 'required|max:255',
        'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'content' => 'required',
    ]);

    // Cari berita berdasarkan ID
    $berita = Berita::findOrFail($id);

    // Update data berita
    $berita->tittle = $request->tittle;
    $berita->content = $request->content;

    // Update banner jika ada file baru
    if ($request->hasFile('banner')) {
        // Hapus banner lama
        if ($berita->banner) {
            Storage::delete('public/berita/' . $berita->banner);
        }
        // Simpan banner baru
        $imagePath = $request->file('banner')->store('public/berita');
        $berita->banner = basename($imagePath);
    }

    $berita->save();

    return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui!');
}

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id); // Ambil berita berdasarkan ID

        // Hapus banner dari storage jika ada
        if ($berita->banner) {
            Storage::delete('public/berita/' . $berita->banner);
        }

        $berita->delete(); // Hapus data berita

        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus!');
    }

}
