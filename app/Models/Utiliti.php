<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utiliti extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    //  protected $connection = 'oracle';
    public $table = 'MYCLAIM.UTILITIS';


}
