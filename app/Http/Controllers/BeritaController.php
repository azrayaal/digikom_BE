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

class BeritaController extends Controller
{
    public function index() : View
    {
        //get all productsphp artisan serve

        $berita = Berita::latest()->paginate(10);
        Log::info('Berita:', ['data' => $berita]);

        //render view with products
        return view('pages.berita.index', compact('berita'));

        
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
             'tittle' => 'required|max:255',
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
