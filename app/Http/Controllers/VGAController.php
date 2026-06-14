<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VGAController extends Controller
{
    public function index()
    {
        // Mengambil data dari tabel VGA
        $vga = DB::table('VGA')->get();

        // Memanggil file view di folder resources/views/vga/index.blade.php
        return view('vga.indexvga', compact('vga'));
    }

    public function create()
    {
        // Memanggil file view di folder resources/views/vga/create.blade.php
        return view('VGA.createvga');
    }

    public function store(Request $request)
    {
        // Validasi input harus berupa angka
        $request->validate([
            'KodeBarang' => 'required|integer',
            'Merk' => 'required|string|max:30',
            'StockHardisk' => 'required|integer|min:0',
            'Tersedia' => 'required|in:Y,N',
        ]);

        // Insert data ke database
        DB::table('VGA')->insert([
            'kodevga' => $request->KodeBarang,
            'merkvga' => $request->Merk,
            'stockvga' => $request->StockHardisk,
            'tersedia' => $request->Tersedia,
        ]);

        // Redirect ke halaman index VGA
        return redirect()->route('vga.indexvga')->with('success', 'Barang berhasil dimasukkan ke stock.');
    }

    public function destroy($kodevga)
    {
        // Hapus data berdasarkan ID (Tombol Batal)
        DB::table('VGA')->where('kodevga', $kodevga)->delete();

        // Redirect ke halaman index VGA
        return redirect()->route('vga.indexvga')->with('success', 'Barang berhasil dihapus dari stock.');
    }
}
