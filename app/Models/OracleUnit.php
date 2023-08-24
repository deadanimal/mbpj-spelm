<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OracleUnit extends Model
{
    use HasFactory;

    // protected $table = 'GE_UNIT';
    //    protected $connection = 'oracle';
    public $table = 'MAJLIS.GE_UNIT';
}
