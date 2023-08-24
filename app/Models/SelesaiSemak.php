<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelesaiSemak extends Model
{
    use HasFactory;
    //  protected $connection = 'oracle';

    public $table = 'MYCLAIM.SELESAISEMAK';

    protected $guarded = ['id'];
}
