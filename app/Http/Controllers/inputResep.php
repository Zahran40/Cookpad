<?php

namespace App\Http\Controllers;
use App\Models\Resep;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


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

        $validated['id_pembuat'] = Auth::user()->id_pembuat;
        $validated['status'] = 'pending';
        $nama = strtolower($validated['nama_resep']);

        // Deteksi kategori otomatis
        if(str_contains($nama,'ayam')){
            $validated['id_kategori'] = 1;
        } elseif(str_contains($nama,'cumi')) {
            $validated['id_kategori'] = 5;
        } elseif(str_contains($nama,'daging')) {
            $validated['id_kategori'] = 4;
        } elseif(str_contains($nama,'kambing')) {
            $validated['id_kategori'] = 9;
        } elseif(str_contains($nama,'kentang')) {
            $validated['id_kategori'] = 8;
        } elseif(str_contains($nama,'mie')) {
            $validated['id_kategori'] = 2;
        } elseif(str_contains($nama,'sayur')) {
            $validated['id_kategori'] = 10;
        } elseif(str_contains($nama,'tahu')) {
            $validated['id_kategori'] = 7;
        } elseif(str_contains($nama,'telur')) {
            $validated['id_kategori'] = 6;
        } elseif(str_contains($nama,'udang')) {
            $validated['id_kategori'] = 3;
        } elseif(str_contains($nama,'tempe')) {
            $validated['id_kategori'] = 11;
        } else {
            // Jika tidak sesuai kriteria, redirect kembali dengan pesan error
            return redirect()->back()
                ->withInput()
                ->with('kategori_error', 'Nama makanan tidak sesuai kriteria');
        }

        if ($request->hasFile('gambar_resep')) {
            $file = $request->file('gambar_resep');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('gambar_resep'), $filename);
            $validated['gambar_resep'] = 'gambar_resep/' . $filename;
        }

//         INSERT INTO resep (
//     nama_resep,
//     deskripsi,
//     bahan,
//     langkah,
//     waktu_pembuatan,
//     gambar_resep,
//     id_pembuat,
//     status,
//     id_kategori,
//     created_at,
//     updated_at
// ) VALUES (
//     'NAMA_RESEP',
//     'DESKRIPSI',
//     'BAHAN',
//     'LANGKAH',
//     'WAKTU_PEMBUATAN',
//     'GAMBAR_RESEP',
//     ID_PEMBUAT,
//     'pending',
//     ID_KATEGORI,
//     NOW(),
//     NOW()
// );

        Resep::create($validated);

        return redirect()->route('homepage')->with('success', 'Resep berhasil ditambahkan!');
    }
}

