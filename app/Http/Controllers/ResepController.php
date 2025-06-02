<?php

namespace App\Http\Controllers;
use App\Models\Resep;

use Illuminate\Http\Request;

class ResepController extends Controller
{
    public function index()
    {
        return redirect('/');
    }

    public function show($id)
    {
     $resep = Resep::findOrFail($id);
    return view('resep', compact('resep'));
    }

    
    
    public function ayam()
    {
    // Ganti 1 dengan id kategori cumi di tabel kategori kamu
    $reseps = Resep::where('id_kategori', 1)->orderBy('id')->limit(150)->get();
    return view('ayam', compact('reseps'));
}
    public function cumi()
    {
    // Ganti 2 dengan id kategori cumi di tabel kategori kamu
    $reseps = Resep::where('id_kategori', 5)->orderBy('id')->limit(150)->get();
    return view('cumi', compact('reseps'));
}
public function daging()
{
    // Ganti 3 dengan id kategori daging di tabel kategori kamu
    $reseps = Resep::where('id_kategori', 4)->orderBy('id')->limit(150)->get();
    return view('daging', compact('reseps'));
}
public function kambing()
{
    // Ganti 4 dengan id kategori kambing di tabel kategori kamu
    $reseps = Resep::where('id_kategori', 9)->orderBy('id')->limit(150)->get();
    return view('kambing', compact('reseps'));
}
public function kentang()
{
    // Ganti 5 dengan id kategori kentang di tabel kategori kamu
    $reseps = Resep::where('id_kategori', 8)->orderBy('id')->limit(150)->get();
    return view('kentang', compact('reseps'));
}
public function mie()
{
    // Ganti 6 dengan id kategori mie di tabel kategori kamu
    $reseps = Resep::where('id_kategori', 2)->orderBy('id')->limit(150)->get();
    return view('mie', compact('reseps'));
}
public function sayur()
{
    // Ganti 7 dengan id kategori sayur di tabel kategori kamu
    $reseps = Resep::where('id_kategori', 10)->orderBy('id')->limit(150)->get();
    return view('sayur', compact('reseps'));
}
public function tahu()
{
    // Ganti 8 dengan id kategori tahu di tabel kategori kamu
    $reseps = Resep::where('id_kategori', 7)->orderBy('id')->limit(150)->get();
    return view('tahu', compact('reseps'));
}
public function telur()
{
    // Ganti 9 dengan id kategori telur di tabel kategori kamu
    $reseps = Resep::where('id_kategori', 6)->orderBy('id')->limit(150)->get();          
    return view('telur', compact('reseps'));
}
public function udang()
{
    // Ganti 10 dengan id kategori udang di tabel kategori kamu
    $reseps = Resep::where('id_kategori', 3)->orderBy('id')->limit(150)->get();
    return view('udang', compact('reseps'));
}
public function tempe()
{
// Ganti 11 dengan id kategori tempe di tabel kategori kamu
$reseps = Resep::where('id_kategori', 11)->orderBy('id')->limit(150)->get();
return view('tempe', compact('reseps'));
}
}
