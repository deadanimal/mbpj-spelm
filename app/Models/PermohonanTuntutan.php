<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermohonanTuntutan extends Model
{
    use HasFactory;
    //  protected $connection = 'oracle';
    public $table = 'MYCLAIM.PERMOHONAN_TUNTUTANS';

    protected $guarded = [''];
}
