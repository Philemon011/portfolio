<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'nom' => 'Sarah K.',
                'entreprise' => 'Startup e-commerce',
                'citation' => 'On avait une idée d\'application mais aucune structure claire. Il a transformé ça en produit concret avec une UI propre, un backend solide et une vraie logique utilisateur. Le résultat est directement exploitable.',
                'actif' => true,
                'ordre' => 1,
            ],
            [
                'nom' => 'David M.',
                'entreprise' => 'Cabinet conseil',
                'citation' => 'Refonte complète de notre site web. Aujourd\'hui tout est plus rapide, plus clair et surtout pensé pour convertir. On a vu une vraie différence sur les demandes clients dès la première semaine.',
                'actif' => true,
                'ordre' => 2,
            ],
            [
                'nom' => 'Clara N.',
                'entreprise' => 'Produit SaaS',
                'citation' => 'Très fort sur la partie frontend. Les interfaces sont modernes, fluides et parfaitement responsive. Même les détails UX auxquels on ne pensait pas ont été bien améliorés.',
                'actif' => true,
                'ordre' => 3,
            ],
            [
                'nom' => 'Kevin A.',
                'entreprise' => 'Application mobile',
                'citation' => 'Il a géré à la fois le design et l\'intégration technique. Ce qu\'on a apprécié, c\'est la capacité à proposer des solutions simples mais efficaces, sans complexifier inutilement le projet.',
                'actif' => true,
                'ordre' => 4,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}