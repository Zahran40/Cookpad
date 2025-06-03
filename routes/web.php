<?php

use App\Http\Controllers\inputResep;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ResepController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KoleksiResepController;

Route::get('/', function () {
    return view('homepage');
})->name('homepage');



Route::get('/myresep', [PageController::class, 'myresep'])->name('myresep');
 Route::get('/profile', [PageController::class, 'profile'])->name('profile');


Route::get('/userprofile/{id}', [PageController::class, 'userprofile'])->name('userprofile');


Route::get('/koleksi', [PageController::class, 'koleksi'])->name('koleksi');
Route::get('/tulis', [PageController::class, 'tulis'])->name('tulis');
// Route::get('/cumi', [PageController::class, 'cumi'])->name('cumi');
// Route::get('/daging', [PageController::class, 'daging'])->name('daging');
// Route::get('/kambing', [PageController::class, 'kambing'])->name('kambing');
// Route::get('/kentang', [PageController::class, 'kentang'])->name('kentang');
// Route::get('/mie', [PageController::class, 'mie'])->name('mie');
// Route::get('/sayur', [PageController::class, 'sayur'])->name('sayur');

Route::get('/tahu', [ResepController::class, 'tahu'])->name('tahu');
// Route::get('/telur', [PageController::class, 'telur'])->name('telur');
// Route::get('/udang', [PageController::class, 'udang'])->name('udang');

// Route::get('/resep', [ResepController::class, 'index'])->name('resep');
Route::get('/resep/{id}', [ResepController::class, 'show'])->name('resep.show');
Route::get('/tempe', [ResepController::class, 'tempe'])->name('tempe');
Route::get('/ayam', [ResepController::class, 'ayam'])->name('ayam');
Route::get('/udang', [ResepController::class, 'udang'])->name('udang');
Route::get('/telur', [ResepController::class, 'telur'])->name('telur');
Route::get('/sayur', [ResepController::class, 'sayur'])->name('sayur');
Route::get('/kambing', [ResepController::class, 'kambing'])->name('kambing');
Route::get('/cumi', [ResepController::class, 'cumi'])->name('cumi');
Route::get('/kentang', [ResepController::class, 'kentang'])->name('kentang');
Route::get('/daging', [ResepController::class, 'daging'])->name('daging');
Route::get('/mie', [ResepController::class, 'mie'])->name('mie');
Route::post('/tulis', [inputResep::class, 'store'])->name('resep.store');


//Route Login dan SignUp



Route::get('/login', [UserController::class, 'showLogin'])->name('showlogin');
Route::post('/login', [UserController::class, 'login'])->name('login');



Route::get('/register', [UserController::class, 'showRegister'])->name('showregister');
Route::post('/register', [UserController::class, 'register'])->name('register');

// Route Log Out

Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// Route Seaarch


Route::get('/search', [ResepController::class, 'search'])->name('search');

// Route resep populer 


Route::get('/', [PageController::class, 'populer'])->name('homepage');

// Route Koleksi Resep





// Route untuk menyimpan resep ke koleksi (POST)
Route::post('/koleksi/{id}', [KoleksiResepController::class, 'simpan'])->name('simpan-koleksi');
Route::get('/koleksi', [KoleksiResepController::class, 'koleksiSaya'])->middleware('auth')->name('koleksi');

Route::delete('/koleksi/{id}', [\App\Http\Controllers\KoleksiResepController::class, 'hapus'])->name('hapus-koleksi');