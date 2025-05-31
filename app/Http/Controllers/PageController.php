<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('homepage');
    }

    public function resep()
    {
        return view('resep');
    }

    public function myresep()
    {
        return view('myresep');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function koleksi()
    {
        return view('koleksi');
    }

    public function tulis()
    {
        return view('tulis');
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
