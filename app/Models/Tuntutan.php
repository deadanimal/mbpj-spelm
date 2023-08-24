<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tuntutan extends Model
{
    use HasFactory;
    public $table = 'MYCLAIM.TUNTUTANS';

    protected $guarded = ['id'];
    //  protected $connection = 'oracle';

    // public function tuntutans()
    // {
    //     return $this->belongsToMany(Tuntutan::class, 'permohonan_tuntutans', 'tuntutan_id', 'permohonan_id');
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
