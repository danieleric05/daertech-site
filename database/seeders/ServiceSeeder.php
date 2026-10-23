<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            ['Conseil informatique', 'conseil', 'conseil', 'Choisir les bons outils et structurer votre projet numérique.'],
            ['Marketing stratégique', 'marketing', 'conseil', 'Définir votre positionnement, votre message et votre plan de communication.'],
            ['Sites web', 'web', 'developpement', 'Sites vitrines et institutionnels clairs, adaptés au mobile.'],
            ['Applications mobiles', 'mobile', 'developpement', 'Applications pensées pour vos utilisateurs et vos usages.'],
            ['Formation', 'formation', 'formation', 'Former vos équipes à leurs outils, avec des cas concrets.'],
            ['Assistance', 'assistance', 'formation', 'Un appui pour répondre à vos questions et résoudre vos difficultés.'],
        ];

        foreach ($rows as $i => [$title, $icon, $page, $summary]) {
            Service::firstOrCreate(['slug' => Service::uniqueSlug($title)], [
                'title' => $title, 'icon' => $icon, 'page_slug' => $page, 'summary' => $summary,
                'description' => $summary, 'status' => 'published', 'position' => $i,
            ]);
        }
    }
}
