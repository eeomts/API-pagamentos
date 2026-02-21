<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payers extends Model
{
    use HasFactory;

    protected $fillable = [
        'clients_id',
        'name',
        'email',
        'docs',
        'gateway_payers_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payments()
    {
        return $this->hasMany(Payments::class);
    }

    public function paymentMethods()
    {
        return $this->hasMany(PaymentsMethod::class);
    }
}