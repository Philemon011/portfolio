<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'nom',
        'metier',
        'email',
        'telephone',
        'whatsapp',
        'github',
        'linkedin',
        'hero_titre',
        'hero_sous_titre',
        'avatar_light',
        'avatar_dark',
        'apropos_lead',
        'apropos_description',
        'annees_experience',
        'projets_livres',
        'taux_satisfaction',
    ];

    // Méthode statique pour récupérer les settings facilement
    public static function getSettings()
    {
        return static::first();
    }
}