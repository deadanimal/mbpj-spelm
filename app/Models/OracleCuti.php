<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OracleCuti extends Model
{
    use HasFactory;
    // protected $connection = 'oracle2';
    public $table = 'SPP.HR_CUTI';

}
