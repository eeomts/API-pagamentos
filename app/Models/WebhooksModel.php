<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Webhook extends Model
{
    use HasFactory;

    protected $fillable = [
        'gateway',
        'event_type',
        'payload',
        'signature',
        'processed'
    ];

    protected $casts = [
        'payload' => 'array',
        'processed' => 'boolean'
    ];
}
