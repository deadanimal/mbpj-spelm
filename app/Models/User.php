<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\Permohonan;
use App\Models\Tuntutan;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function permohonans()
    {
        return $this->belongsToMany(Permohonan::class, 'user_permohonans', 'user_id', 'permohonan_id');
    }    
    public function tuntutans()
    {
        return $this->belongsToMany(Tuntutan::class, 'permohonan_tuntutans', 'tuntutan_id', 'permohonan_id');
    }    
}
