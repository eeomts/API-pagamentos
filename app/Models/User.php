<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'url'
    ];

    protected $hidden = [
        'password'
    ];

    // 🔹 Um usuário tem muitos clientes
    public function customers()
    {
        return $this->hasMany(Payers::class);
    }

    // 🔹 Um usuário tem muitos pagamentos
    public function payments()
    {
        return $this->hasMany(Payments::class);
    }
}