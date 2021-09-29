<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tuntutan extends Model
{
    use HasFactory;

    public function tuntutans()
    {
        return $this->belongsToMany(Tuntutan::class, 'permohonan_tuntutans', 'tuntutan_id', 'permohonan_id');
    }  
}
