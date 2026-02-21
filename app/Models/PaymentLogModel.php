<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentLog extends Model
{
    use HasFactory;

    protected $table = 'payment_logs';

    protected $fillable = [
        'payment_id',
        'status',
        'message'
    ];

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}