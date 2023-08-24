<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bahagian extends Model
{
    use HasFactory;

    // protected $table = 'ge_bahagian';
    // protected $connection = 'oracle2';

    public $table = 'MAJLIS.GE_BAHAGIAN';

    // public function jabatan()
    // {
    //     return $this->belongsTo(Jabatan::class, 'GE_KOD_JABATAN', 'GE_KOD_JABATAN');
    // }

    // public function getGeKodBahagianAttribute($value)
    // {
    //     return count(OracleGaji::where('HR_BAHAGIAN', $value)->get());
    // }

}
