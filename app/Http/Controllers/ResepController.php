<?php

namespace App\Http\Controllers;
use App\Models\Resep;
use Illuminate\Support\Facades\Auth;
use App\Models\KoleksiResep;
use \App\Models\User;

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
    $pembuat = \App\Models\User::find($resep->id_pembuat);
    $sudahDisimpan = false;

    if (Auth::check()) {
        $sudahDisimpan = KoleksiResep::where('id_pembuat', Auth::user()->id_pembuat)
            ->where('resep_id', $id)
            ->exists();
    }

    return view('resep', compact('resep', 'pembuat', 'sudahDisimpan'));
}

    
    
    public function ayam()
    {

    // Ganti 1 dengan id kategori cumi di tabel kategori kamu

    // SELECT * FROM resep WHERE id_kategori = 1 ORDER BY id_resep ;
    
    $reseps = Resep::where('status', 'approved')->where('id_kategori', 1)->orderBy('id', 'desc')->get();
    return view('ayam', compact('reseps'));
}
    public function cumi()
    {
    // Ganti 2 dengan id kategori cumi di tabel kategori kamu
    // SELECT * FROM resep WHERE id_kategori = 5 ORDER BY id_resep LIMIT 150;
    $reseps = Resep::where('status', 'approved')->where('id_kategori', 5)->orderBy('id')->limit(150)->get();
    return view('cumi', compact('reseps'));
}
public function daging()
{
    // Ganti 3 dengan id kategori daging di tabel kategori kamu
    // SELECT * FROM resep WHERE id_kategori = 4 ORDER BY id_resep LIMIT 150;

    $reseps = Resep::where('status', 'approved')->where('id_kategori', 4)->orderBy('id')->limit(150)->get();
    return view('daging', compact('reseps'));
}
public function kambing()
{
    // Ganti 4 dengan id kategori kambing di tabel kategori kamu
    // SELECT * FROM resep WHERE id_kategori = 9 ORDER BY id_resep LIMIT 150;

    $reseps = Resep::where('status', 'approved')->where('id_kategori', 9)->orderBy('id')->limit(150)->get();
    return view('kambing', compact('reseps'));
}
public function kentang()
{
    // Ganti 5 dengan id kategori kentang di tabel kategori kamu
    // SELECT * FROM resep WHERE id_kategori = 8 ORDER BY id_resep LIMIT 150;
    $reseps = Resep::where('status', 'approved')->where('id_kategori', 8)->orderBy('id')->limit(150)->get();
    return view('kentang', compact('reseps'));
}
public function mie()
{
    // Ganti 6 dengan id kategori mie di tabel kategori kamu
    // SELECT * FROM resep WHERE id_kategori = 2 ORDER BY id_resep LIMIT
    $reseps = Resep::where('status', 'approved')->where('id_kategori', 2)->orderBy('id')->limit(150)->get();
    return view('mie', compact('reseps'));
}
public function sayur()
{
    // Ganti 7 dengan id kategori sayur di tabel kategori kamu
    // SELECT * FROM resep WHERE id_kategori = 10 , status = 'approved' ORDER BY id_resep LIMIT 150;
    $reseps = Resep::where('status', 'approved')->where('id_kategori', 10)->orderBy('id')->limit(150)->get();
    return view('sayur', compact('reseps'));
}
public function tahu()
{
   
    // SELECT * FROM resep WHERE id_kategori = 7 ORDER BY id_resep LIMIT
        $reseps = Resep::where('status', 'approved')->where('id_kategori', 7)->orderBy('id', 'desc')->get();
    return view('tahu', compact('reseps'));
}
public function telur()
{
    // Ganti 9 dengan id kategori telur di tabel kategori kamu
    // SELECT * FROM resep WHERE id_kategori = 6 ORDER BY id_resep LIMIT 150;

    $reseps = Resep::where('status', 'approved')->where('id_kategori', 6)->orderBy('id')->limit(150)->get();          
    return view('telur', compact('reseps'));
}
public function udang()
{
    // Ganti 10 dengan id kategori udang di tabel kategori kamu
    // SELECT * FROM resep WHERE id_kategori = 3 ORDER BY id_resep LIMIT
    $reseps = Resep::where('status', 'approved')->where('id_kategori', 3)->orderBy('id')->limit(150)->get();
    return view('udang', compact('reseps'));
}
public function tempe()
{
// Ganti 11 dengan id kategori tempe di tabel kategori kamu
// SELECT * FROM resep WHERE id_kategori = 11 ORDER BY id_resep LIMIT 150;
$reseps = Resep::where('status', 'approved')->where('id_kategori', 11)->orderBy('id')->limit(150)->get();
return view('tempe', compact('reseps'));
}

public function search(Request $request)
{
    $keyword = $request->input('keyword');

    if ($keyword) {
        $reseps = Resep::where('nama_resep', 'LIKE', '%' . $keyword . '%')
            ->orWhere('deskripsi', 'LIKE', '%' . $keyword . '%')
            ->orderBy('id', 'desc')
            ->paginate(100);
    } else {
        $reseps = Resep::where('status', 'approved')->orderBy('id', 'desc')->paginate(100);
    }

    return view('Search', compact('reseps', 'keyword'));
}



}
