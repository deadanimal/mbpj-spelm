<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OracleGaji extends Model
{
    use HasFactory;
    protected $connection = 'oracle';
    public $table ='SPP.HR_MAKLUMAT_PEKERJAAN';


}
  