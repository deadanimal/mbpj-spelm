<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermohonanLevel2 extends Model
{
    use HasFactory;
    //  protected $connection = 'oracle';

    protected $table = 'MYCLAIM.PERMOHONANLEVEL2';
    protected $guarded = ['id'];

    public function permohonan()
    {
        return $this->belongsTo(Permohonan::class);
    }
}
