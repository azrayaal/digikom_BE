<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

//import model product
use App\Models\Iuran; 
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

//import return type View
use Illuminate\View\View;

class IuranController extends Controller
{
    public function index() : View
    {
        //get all productsphp artisan serve

        $iuran = Iuran::latest()->paginate(10);
        Log::info('Iuran:', ['data' => $iuran]);
        //render view with products
        Log::info('Iuran:', ['iuran'=> $iuran]);
        return view('pages.iuran.index', compact('iuran'));
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
            'bulan' => 'required|max:255',
            'jumlah' => 'required',
            'keterangan' => 'required',
        ]);

         // Menyimpan data iuran ke database
        $iuran = new Iuran;
        $iuran->bulan = $request->bulan;
        $iuran->jumlah = $request->jumlah;
        $iuran->keterangan = $request->keterangan;
        //  $iuran->created_by = auth()->id();  // Menyimpan ID admin yang membuat iuran
        $iuran->created_by = 1;  
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
            $iuran = new Iuran;
            $iuran->bulan = $request->bulan;
            $iuran->jumlah = $request->jumlah;
            $iuran->keterangan = $request->keterangan;
            //  $iuran->created_by = auth()->id();  // Menyimpan ID admin yang membuat iuran
            $iuran->created_by = 1;  
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
