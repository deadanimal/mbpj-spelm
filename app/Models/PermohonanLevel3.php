<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermohonanLevel3 extends Model
{
    use HasFactory;
    protected $table = 'PermohonanLevel3';
    protected $guarded = ['id'];

    public function permohonan()
    {
        return $this->belongsTo(Permohonan::class);
    }
}
