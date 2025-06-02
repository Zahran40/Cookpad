<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Resep;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('homepage');
    }

    
public function populer()
{
   
$populer = Resep::where('status', 'approved')->orderBy('id', 'desc')->get();
    $resepAcak = Resep::where('status', 'approved')->inRandomOrder()->limit(8)->get();
    $resepSate = Resep::where('status', 'approved')->where('nama_resep', 'like', '%sate%')->get();
    // ...kategori lain juga tambahkan where('status', 'approved')
    return view('homepage', compact('populer', 'resepAcak', 'resepSate'));
}

    public function login()
    {
        return view('login');
    }

    public function signup()
    {
        return view('sign-up');
    }

    public function resep()
    {
        return view('resep');
    }

    public function myresep()
{
    if (!Auth::check()) {
        return redirect()->route('showlogin');
    }
    // select * from user where id = $user->id
    $user = Auth::user();
    // Select * from resep where id_pembuat = $user->id_pembuat
    $reseps = Resep::where('id_pembuat', $user->id_pembuat)->get();
    return view('myresep', compact('user', 'reseps'));
}

    public function profile()
    {
        // select * from user where id = $user->id
        $user = Auth::user();
        // Ambil semua resep milik user login
        // Select * from resep where id_pembuat = $user->id_pembuat
       $reseps = Resep::where('id_pembuat', $user->id_pembuat)->get();
       return view('profile', compact('user', 'reseps'));
    }

    public function koleksi()
    {
        return view('koleksi');
    }

    public function tulis()
{
    if(Auth::check()){
        //select * from user where id = $user->id
        $user = Auth::user();
        return view('tulis', compact('user'));
    } else {
        return redirect()->route('login');
    }
}

    public function ayam()
    {
        return view('ayam');
    }

    public function cumi()
    {
        return view('cumi');
    }

    public function daging()
    {
        return view('daging');
    }

    public function kambing()
    {
        return view('kambing');
    }

    public function kentang()
    {
        return view('kentang');
    }

    public function mie()
    {
        return view('mie');
    }

    public function sayur()
    {
        return view('sayur');
    }

    public function tahu()
    {
        return view('tahu');
    }

    public function telur()
    {
        return view('telur');
    }

    public function tempe()
    {
        return view('tempe');
    }

    public function udang()
    {
        return view('udang');
    }
}
