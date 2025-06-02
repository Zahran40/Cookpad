<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    public function reseps()
{

    // Satu kategori memiliki banyak resep (one-to-many relationship)
    return $this->hasMany(Resep::class, 'kategori_id');
}
}
