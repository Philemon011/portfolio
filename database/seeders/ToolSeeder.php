<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class ToolSeeder extends Seeder
{
    public function run(): void
    {
        $tools = [
            ['nom' => 'Laravel',      'logo' => 'tools/laravel.svg',     'ordre' => 1],
            ['nom' => 'Vue.js',       'logo' => 'tools/vuejs.svg',       'ordre' => 2],
            ['nom' => 'React',        'logo' => 'tools/react.svg',       'ordre' => 3],
            ['nom' => 'Flutter',      'logo' => 'tools/flutter.svg',     'ordre' => 4],
            ['nom' => 'TailwindCSS',  'logo' => 'tools/tailwind.svg',    'ordre' => 5],
            ['nom' => 'PostgreSQL',   'logo' => 'tools/postgresql.svg',  'ordre' => 6],
            ['nom' => 'Figma',        'logo' => 'tools/figma.svg',       'ordre' => 7],
            ['nom' => 'GitHub',       'logo' => 'tools/github.svg',      'ordre' => 8],
            ['nom' => 'Docker',       'logo' => 'tools/docker.svg',      'ordre' => 9],
            ['nom' => 'JavaScript',   'logo' => 'tools/javascript.svg',  'ordre' => 10],
        ];

        foreach ($tools as $tool) {
            Tool::create($tool + ['actif' => true]);
        }
    }
}