<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manual extends Model
{
    use HasFactory;
    public $table = 'MYCLAIM.MANUALS';

    protected $fillable = [
        'notis',
        'name',
        'file_path'
    ];
}
