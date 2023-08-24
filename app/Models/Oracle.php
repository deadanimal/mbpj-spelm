<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oracle extends Model
{
    use HasFactory;
    // protected $connection = 'oracle2';
    public $table = 'MAJLIS.PRUSER';

}
