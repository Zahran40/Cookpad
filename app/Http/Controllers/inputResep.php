<?php

namespace App\Http\Controllers;
use App\Models\Resep;


use Illuminate\Http\Request;

class inputResep extends Controller
{
    public function store(Request $request)
{
    $validated = $request->validate([
        'nama_resep' => 'required|string|max:255',
        'deskripsi' => 'nullable|string',
        'bahan' => 'required|string',
        'langkah' => 'required|string',
        'waktu_pembuatan' => 'required|string|max:100',
        'gambar_resep' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);
 $validated['id_pembuat'] = 101; // ganti dengan id user yang sesuai

    $validated['status'] = 'pending';
    $nama = strtolower($validated['nama_resep']);
    if(str_contains($nama,'ayam')){
        $validated['id_kategori'] = 1; // Set id_kategori ke 1 untuk ayam
    } elseif(str_contains($nama,'cumi')) {
        $validated['id_kategori'] = 5; // Set id_kategori ke 5 untuk cumi
    } elseif(str_contains($nama,'daging')) {
        $validated['id_kategori'] = 4; // Set id_kategori ke 4 untuk daging
    } elseif(str_contains($nama,'kambing')) {
        $validated['id_kategori'] = 9; // Set id_kategori ke 9 untuk kambing
    } elseif(str_contains($nama,'kentang')) {
        $validated['id_kategori'] = 8; // Set id_kategori ke 8 untuk kentang
    } elseif(str_contains($nama,'mie')) {
        $validated['id_kategori'] = 2; // Set id_kategori ke 2 untuk mie
    } elseif(str_contains($nama,'sayur')) {
        $validated['id_kategori'] = 10; // Set id_kategori ke 3 untuk sayur
    } elseif(str_contains($nama,'tahu')) {
        $validated['id_kategori'] = 7; // Set id_kategori ke 6 untuk tahu
    } elseif(str_contains($nama,'telur')) {
        $validated['id_kategori'] = 6; // Set id_kategori ke 7 untuk telur
    } elseif(str_contains($nama,'udang')) {
        $validated['id_kategori'] = 3; // Set id_kategori ke 10 untuk udang
    }elseif(str_contains($nama,'tempe')) {
        $validated['id_kategori'] = 11; // Set id_kategori ke 11 untuk tempe
    } else {
        $validated['id_kategori'] = null; // Jika tidak ada kategori yang cocok, set null
    } // Set status default ke 'aktif'

    if ($request->hasFile('gambar_resep')) {
    $file = $request->file('gambar_resep');
    $filename = uniqid() . '.' . $file->getClientOriginalExtension();
    $file->move(public_path('gambar_resep'), $filename);
    $validated['gambar_resep'] = 'gambar_resep/' . $filename;
}

    Resep::create($validated);

    return redirect()->route('homepage')->with('success', 'Resep berhasil ditambahkan!');
}
}
