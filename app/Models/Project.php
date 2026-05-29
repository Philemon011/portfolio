<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'titre',
        'categorie',
        'client',
        'date',
        'description',
        'image',
        'technologies',
        'lien',
        'filtre',
        'actif',
        'ordre',
    ];

    protected $casts = [
        'technologies' => 'array', // JSON -> tableau PHP automatiquement
        'actif' => 'boolean',
    ];

    public function scopeActifs($query)
    {
        return $query->where('actif', true)->orderBy('ordre');
    }
}