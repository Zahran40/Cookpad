<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KoleksiResep extends Model
{
    protected $table = 'koleksi_resep';
    protected $fillable = ['id_pembuat', 'resep_id'];

    public function resep()
    {
        return $this->belongsTo(Resep::class, 'resep_id');
    }
}