<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'nom',
        'email',
        'objet',
        'message',
        'lu',
    ];

    protected $casts = [
        'lu' => 'boolean',
    ];

    // Scope messages non lus
    public function scopeNonLus($query)
    {
        return $query->where('lu', false);
    }
}