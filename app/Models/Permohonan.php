<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{
    use HasFactory;
    protected $guarded = [''];
    protected $with = ['pegawaiSokong', 'pegawaiLulus'];

    public function pegawaiSokong()
    {
        return $this->hasOne(User::class, 'id', 'pegawai_sokong_id');
    }
    public function pegawaiLulus()
    {
        return $this->hasOne(User::class, 'id', 'pegawai_lulus_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
