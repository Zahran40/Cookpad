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

        // Cari user berdasarkan nama
        // SQL: SELECT * FROM users WHERE nama = ? LIMIT 1
        $user = User::where('nama', $credentials['name'])->first();

        if ($user) {
            $hashed = $user->password;
            // Cek apakah password sudah bcrypt
            if ((strlen($hashed) === 60) && (substr($hashed, 0, 4) === '$2y$' || substr($hashed, 0, 4) === '$2b$')) {
                // SQL: (verifikasi hash di PHP, bukan SQL)
                // select * from users where nama = 'nama'
                if (Hash::check($credentials['password'], $hashed)) {
                    Auth::login($user);
                } else {
                    return back()->withErrors(['name' => 'Nama pengguna atau password salah.']);
                }
            } else {
                // Password masih plain text
                // SQL: (verifikasi plain text di PHP, bukan SQL)
                // select * from users where nama = 'nama' and password = 'password'
                // (hash password untuk verifikasi)
                if ($credentials['password'] === $hashed) {
                    Auth::login($user);
                } else {
                    return back()->withErrors(['name' => 'Nama pengguna atau password salah.']);
                }
            }

            // Redirect sesuai role
            if ($user->role === 'admin') {
                return redirect('/admin1');
            } else {
                return redirect('/');
            }
        }

        return back()->withErrors(['name' => 'Nama pengguna atau password salah.']);
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
    
        // SQL: INSERT INTO users (nama, email, password, role, created_at, updated_at) VALUES (?, ?, ?, ?, NOW(), NOW())
        $user = User::create([
            'nama' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role' => 'user',
        ]);

        Auth::login($user);
        return redirect('/login')->with('success', 'Registrasi berhasil! Silakan login.');// redirect ke halaman utama setelah daftar
    }

    public function logout()
    {
        Auth::logout();
        // Tidak ada SQL, hanya session destroy
        return redirect()->route('homepage')->with('success', 'Anda telah berhasil keluar.');
    }
}