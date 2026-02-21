<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payments extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'payers_id',
        'gateway_payment_id',
        'amount',
        'currency',
        'status',
        'payment_method',
        'description',
        'paid_at'
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'paid_at' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function customer()
    {
        return $this->belongsTo(Payers::class);
    }

    public function logs()
    {
        return $this->hasMany(PaymentLog::class);
    }
}