<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', function () {
    return view('homepage');
})->name('homepage');


Route::get('/sign-up', [PageController::class, 'signup'])->name('signup');
Route::get('/login', [PageController::class, 'login'])->name('login');
Route::get('/resep', [PageController::class, 'resep'])->name('resep');
Route::get('/myresep', [PageController::class, 'myresep'])->name('myresep');
Route::get('/profile', [PageController::class, 'profile'])->name('profile');
Route::get('/koleksi', [PageController::class, 'koleksi'])->name('koleksi');
Route::get('/tulis', [PageController::class, 'tulis'])->name('tulis');
Route::get('/ayam', [PageController::class, 'ayam'])->name('ayam');
Route::get('/cumi', [PageController::class, 'cumi'])->name('cumi');
Route::get('/daging', [PageController::class, 'daging'])->name('daging');
Route::get('/kambing', [PageController::class, 'kambing'])->name('kambing');
Route::get('/kentang', [PageController::class, 'kentang'])->name('kentang');
Route::get('/mie', [PageController::class, 'mie'])->name('mie');
Route::get('/sayur', [PageController::class, 'sayur'])->name('sayur');
Route::get('/tahu', [PageController::class, 'tahu'])->name('tahu');
Route::get('/telur', [PageController::class, 'telur'])->name('telur');
Route::get('/tempe', [PageController::class, 'tempe'])->name('tempe');
Route::get('/udang', [PageController::class, 'udang'])->name('udang');