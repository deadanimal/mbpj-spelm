<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermohonansDibuang extends Model
{
    use HasFactory;
    //  protected $connection = 'oracle';

    protected $table = "MYCLAIM.PERMOHONANS_DIBUANG";
    protected $guarded = [""];
}
