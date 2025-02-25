<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audit extends Model
{
    /** @use HasFactory<\Database\Factories\AuditFactory> */
    use HasFactory;

    protected $fillable = [
        'message',
        'source',
        'method',
    ];
}
