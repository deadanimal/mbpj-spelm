<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermohonanLevel1 extends Model
{
    use HasFactory;
    protected $table = 'PermohonanLevel1';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function permohonan()
    {
        return $this->belongsTo(Permohonan::class);
    }
}
