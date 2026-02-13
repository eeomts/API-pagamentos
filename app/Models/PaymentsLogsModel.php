<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_id',
        'status',
        'message'
    ];

    // 🔹 Pertence ao pagamento
    public function payment()
    {
        return $this->belongsTo(Payments::class);
    }
}