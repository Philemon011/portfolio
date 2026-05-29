<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'numero',
        'titre',
        'description',
        'actif',
        'ordre',
    ];

    protected $casts = [
        'actif' => 'boolean',
    ];

    // Scope pour récupérer uniquement les services actifs triés
    public function scopeActifs($query)
    {
        return $query->where('actif', true)->orderBy('ordre');
    }
}