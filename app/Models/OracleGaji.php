<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OracleGaji extends Model
{
    use HasFactory;
    //
    // public $table = 'HR_MAKLUMAT_PEKERJAAN';
    // protected $guarded = 'HR_NO_PEKERJA';
    protected $guarded = ['HR_NO_PEKERJA'];


    //  protected $connection = 'oracle';
    public $table = 'SPP.HR_MAKLUMAT_PEKERJAAN';

}
