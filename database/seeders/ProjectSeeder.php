<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'titre' => 'Plateforme de Livraison de Colis',
                'categorie' => 'Développement / SaaS',
                'client' => 'PayFlow Inc.',
                'date' => 'Octobre 2025',
                'description' => 'Une solution digitale de livraison de colis à Cotonou permettant de simplifier et d\'accélérer l\'envoi et la réception de marchandises.',
                'image' => 'projects/livrexpress.png',
                'technologies' => ['HTML5/CSS3', 'JavaScript ES6', 'REST API', 'ChartJS', 'TailwindCSS'],
                'lien' => null,
                'filtre' => 'dev',
                'actif' => true,
                'ordre' => 1,
            ],
            [
                'titre' => 'Application Mobilité Urbaine',
                'categorie' => 'UI/UX Design',
                'client' => 'VeloCity Paris',
                'date' => 'Janvier 2026',
                'description' => 'Conception complète de l\'expérience utilisateur et de l\'interface graphique d\'une application mobile de partage de vélos et trottinettes électriques en ville.',
                'image' => 'projects/net.png',
                'technologies' => ['Figma', 'Design System', 'Wireframing', 'User Research'],
                'lien' => null,
                'filtre' => 'design',
                'actif' => true,
                'ordre' => 2,
            ],
            [
                'titre' => 'Concept Store Eco-responsable',
                'categorie' => 'Développement / E-commerce',
                'client' => 'GreenWear',
                'date' => 'Décembre 2025',
                'description' => 'Création et intégration d\'une plateforme de commerce électronique sur-mesure pour une marque de mode éthique.',
                'image' => 'projects/kiing.png',
                'technologies' => ['HTML5', 'CSS Grid', 'JS Vanilla', 'Shopify API'],
                'lien' => null,
                'filtre' => 'dev',
                'actif' => true,
                'ordre' => 3,
            ],
            [
                'titre' => 'Landing Page Immobilier Prestige',
                'categorie' => 'UI/UX Design',
                'client' => 'Prestige Habitat',
                'date' => 'Février 2026',
                'description' => 'Design d\'une page de destination à fort taux de conversion pour la promotion de résidences de luxe.',
                'image' => 'projects/factura.png',
                'technologies' => ['Figma', 'UI Design', 'Visual Layout', 'Responsive Design'],
                'lien' => null,
                'filtre' => 'design',
                'actif' => true,
                'ordre' => 4,
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}