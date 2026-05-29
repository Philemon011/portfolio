<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        Setting::create([
            'nom' => 'Philémon',
            'metier' => 'Développeur Fullstack',
            'email' => 'etoundelight1@gmail.com',
            'telephone' => '+229 01 60 58 59 50',
            'whatsapp' => '+2290160585950',
            'github' => 'https://github.com/Philemon011',
            'linkedin' => 'https://www.linkedin.com/in/etounde-philémon-8111222aa',

            'hero_titre' => 'Je crée des apps web & mobile, des interfaces modernes et des expériences digitales fluides.',
            'hero_sous_titre' => 'Développeur Fullstack spécialisé en web et mobile. Je conçois des applications rapides, modernes et pensées pour une vraie expérience utilisateur.',

            'avatar_light' => 'avatars/light.jpg',
            'avatar_dark' => 'avatars/dark.jpg',

            'apropos_lead' => 'J\'accompagne les entrepreneurs, freelances et PME dans la transformation de leurs idées en solutions digitales (sites et applications web), avec un design soigné, une navigation fluide et une vraie stratégie derrière chaque interface.',
            'apropos_description' => 'Mon rôle ne se limite pas au développement. Je pense chaque projet comme un produit digital : structure, expérience utilisateur, performance et objectifs business.',

            'annees_experience' => 5,
            'projets_livres' => 20,
            'taux_satisfaction' => 98,
        ]);
    }
}