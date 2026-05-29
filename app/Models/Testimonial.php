<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'nom',
        'entreprise',
        'citation',
        'actif',
        'ordre',
    ];

    protected $casts = [
        'actif' => 'boolean',
    ];

    public function scopeActifs($query)
    {
        return $query->where('actif', true)->orderBy('ordre');
    }
}