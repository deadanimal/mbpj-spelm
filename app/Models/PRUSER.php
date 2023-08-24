<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PRUSER extends Model
{
    use HasFactory;
    // protected $table = 'PRUSER';
    // protected $connection = 'oracle2';
    // protected $connection = 'oracle';

    public $table = 'MAJLIS.PRUSER';
    public $timestamps = false;
}
