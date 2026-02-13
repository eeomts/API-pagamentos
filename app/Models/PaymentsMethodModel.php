<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentsMethod extends Model
{
    use HasFactory;

    protected $fillable = [
        'payers_id',
        'gateway_token',
        'brand',
        'last_four'
    ];

    // 🔹 Pertence ao cliente
    public function customer()
    {
        return $this->belongsTo(Payers::class);
    }
}