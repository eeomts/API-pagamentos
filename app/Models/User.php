<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
   use HasFactory, Notifiable;

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'url'
    ];

    protected $hidden = [
        'password'
    ];
    
    public function customers()
    {
        return $this->hasMany(Payers::class);
    }


    public function payments()
    {
        return $this->hasMany(Payments::class);
    }
}