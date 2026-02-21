<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payer extends Model
{
    use HasFactory;

    protected $table = 'payers';

    protected $fillable = [
        'user_id',
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
        return $this->hasMany(Payment::class);
    }

    public function paymentMethods()
    {
        return $this->hasMany(PaymentMethod::class);
    }
}