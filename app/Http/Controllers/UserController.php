<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    

public function login(Request $request)
{
    $credentials = $request->validate([
        'name' => 'required|string',
        'password' => 'required|string',
    ]);
    // select * from `users` where `nama` = ? limit 1
    $user = User::where('nama', $credentials['name'])->first();

    if ($user) {
        $hashed = $user->password;
        // Cek apakah password sudah bcrypt (panjang 60 dan diawali $2y$ atau $2b$)
        if ((strlen($hashed) === 60) && (substr($hashed, 0, 4) === '$2y$' || substr($hashed, 0, 4) === '$2b$')) {
            if (Hash::check($credentials['password'], $hashed)) {
                Auth::login($user);
                return redirect()->intended('/');
            }
        } else {
            // Password masih plain text
            if ($credentials['password'] === $hashed) {
                Auth::login($user);
                return redirect()->intended('/');
            }
        }
    }

    return back()->withErrors([
        'name' => 'Nama pengguna atau password salah.',
    ]);
}

    


public function showRegister()
{
    return view('sign-up');
}

public function register(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6',
    ]);
 
    // insert into `users` (`nama`, `email`, `password`, `role`) values (?, ?, ?, ?)
    $user = User::create([
        'nama' => $validated['name'],
        'email' => $validated['email'],
        'password' => bcrypt($validated['password']),
        'role' => 'user',
    ]);

    Auth::login($user);
    return redirect('/'); // redirect ke halaman utama setelah daftar
}
// ...existing code...

    public function logout()
    {
        Auth::logout();
        return redirect()->route('homepage')->with('success', 'Anda telah berhasil keluar.');
    }
}