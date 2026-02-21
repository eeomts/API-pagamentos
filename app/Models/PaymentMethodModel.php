<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentMethod extends Model
{
    use HasFactory;

    protected $table = 'payment_methods';

    protected $fillable = [
        'payer_id',
        'gateway_token',
        'brand',
        'last_four'
    ];

    public function payer()
    {
        return $this->belongsTo(Payer::class);
    }
}