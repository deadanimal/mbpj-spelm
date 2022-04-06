<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bahagian extends Model
{
    use HasFactory;

    protected $table = 'GE_BAHAGIAN';

    // public function jabatan()
    // {
    //     return $this->belongsTo(Jabatan::class, 'GE_KOD_JABATAN', 'GE_KOD_JABATAN');
    // }
}
