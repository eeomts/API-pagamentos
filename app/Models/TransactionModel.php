<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    protected $fillable = [
        'payment_id',
        'gateway_transaction_id',
        'type',
        'status',
        'amount',
        'raw_response'
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'raw_response' => 'json',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];


    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function payer()
    {
        return $this->hasOneThrough(
            Payer::class,
            Payment::class,
            'id',          
            'id',          
            'payment_id',  
            'payer_id'     
        );
    }

    public function user()
    {
        return $this->hasOneThrough(
            User::class,
            Payment::class,
            'id',          
            'id',          
            'payment_id',  
            'user_id'      
        );
    }
}
