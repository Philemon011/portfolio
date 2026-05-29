<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'numero' => 1,
                'titre' => 'UI/UX & Design Produit',
                'description' => 'Conception d\'interfaces modernes, design systems, prototypage et réflexion produit centrée utilisateur pour des expériences fluides et cohérentes.',
                'actif' => true,
                'ordre' => 1,
            ],
            [
                'numero' => 2,
                'titre' => 'Développement Web & Mobile',
                'description' => 'Création d\'applications web et mobiles performantes avec des architectures propres, scalables et des interfaces réactives.',
                'actif' => true,
                'ordre' => 2,
            ],
            [
                'numero' => 3,
                'titre' => 'Backend & API',
                'description' => 'Développement d\'API robustes, gestion de bases de données et logique métier pour des applications complètes et sécurisées.',
                'actif' => true,
                'ordre' => 3,
            ],
            [
                'numero' => 4,
                'titre' => 'Optimisation & Performance',
                'description' => 'Optimisation des performances, SEO technique, rapidité de chargement et amélioration des Core Web Vitals.',
                'actif' => true,
                'ordre' => 4,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}