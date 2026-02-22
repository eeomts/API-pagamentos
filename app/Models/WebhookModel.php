<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Webhook extends Model
{
    use HasFactory;

    protected $table = 'webhooks';

    protected $fillable = [
        'event',
        'payload',
        'received_at'
    ];
    protected $casts = [
        'payload' => 'json',
        'received_at' => 'datetime'
    ];
    
}
