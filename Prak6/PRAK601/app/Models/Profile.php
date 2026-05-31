<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'nama_lengkap',
        'gambar',
        'nim',
        'asal_prodi',
        'hobi',
        'skill',
        'informasi_tambahan',
    ];
}