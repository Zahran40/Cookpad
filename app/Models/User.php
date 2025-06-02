<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';
    protected $primaryKey = 'id_pembuat';
    public $timestamps = false;

    protected $fillable = [
        'nama', 'email', 'password', 'role'
    ];

    protected $hidden = [
        'password',
    ];
}