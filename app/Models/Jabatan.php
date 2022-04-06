<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
    protected $table = 'GE_JABATAN';

    // public function bahagian()
    // {
    //     return $this->hasMany(Bahagian::class, 'GE_KOD_JABATAN', 'GE_KOD_JABATAN');
    // }

}
