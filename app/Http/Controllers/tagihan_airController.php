<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class tagihan_airController extends Controller
{
    public function index()
    {
        // Mengambil data dari tabel tagihan_air
        $tagihan_air = DB::table('tagihan_air')->get();

        // Memanggil file view di folder resources/views/tagihan_air/index.blade.php
        return view('tagihan_air.index', compact('tagihan_air'));
    }

    public function create()
    {
        // Memanggil file view di folder resources/views/tagihan_air/create.blade.php
        return view('tagihan_air.create');
    }

    public function store(Request $request)
    {
        // Validasi input harus berupa angka
        $request->validate([
            'ID' => 'required|integer',
            'NoMeteran' => 'required|string|max:10',
            'MeterAwal' => 'required|integer|min:0',
            'MaterAkhir' => 'required|integer|min:0',
        ]);

        // Insert data ke database
        DB::table('tagihan_air')->insert([
            'ID' => $request->ID,
            'NoMeteran' => $request->NoMeteran,
            'MeterAwal' => $request->MeterAwal,
            'MaterAkhir' => $request->MaterAkhir,
        ]);

        // Redirect ke halaman index tagihan_air
        return redirect()->route('tagihan_air.index')->with('success', 'Tagihan berhasil ditambahkan.');
    }

    public function destroy($ID)
    {
        // Hapus data berdasarkan ID (Tombol Batal) ga perlu karena ga ada di soalnya
        DB::table('tagihan_air')->where('ID', $ID)->delete();

        // Redirect ke halaman index tagihan_air
        return redirect()->route('tagihan_air.index')->with('success', 'Tagihan berhasil dihapus.');
    }
}
