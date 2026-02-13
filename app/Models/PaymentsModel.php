<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payments extends Model
{
    use HasFactory;

    protected $fillable = [
        'clients_id',
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

    // 🔹 Pertence ao usuário
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 🔹 Pertence ao cliente
    public function customer()
    {
        return $this->belongsTo(Payers::class);
    }

    // 🔹 Tem vários logs
    public function logs()
    {
        return $this->hasMany(PaymentLog::class);
    }
}