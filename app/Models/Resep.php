<?php

namespace App\Models;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    protected $table = 'resep';
    public $timestamps = false;
     protected $fillable = [
        'nama_resep',
        'gambar_resep',
        'deskripsi',
        'bahan',
        'waktu_pembuatan',
        'langkah',
        'status',
        'id_kategori',
        'id_pembuat',
    ];
    public function kategori()
{
    // Satu resep belongs to satu kategori (many-to-one relationship)
    return $this->belongsTo(Kategori::class, 'kategori_id');
}

public function user()
{
    // Satu resep belongs to satu user (many-to-one relationship)
    return $this->belongsTo(User::class, 'id_pembuat');
}

}
