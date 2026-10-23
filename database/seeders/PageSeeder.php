<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            'home' => [
                'title' => 'Accueil',
                'meta_description' => 'DaerTech accompagne les entreprises en Côte d\'Ivoire : conseil informatique, marketing stratégique, sites web, applications mobiles et formation.',
                'hero_title' => 'Votre partenaire numérique en Côte d\'Ivoire',
                'hero_subtitle' => 'Conseil informatique, marketing stratégique, sites web et applications mobiles, formation et assistance.',
                'content' => '<p>DaerTech accompagne les entreprises, les organisations et les indépendants dans leur transformation numérique. Nous partons de vos besoins réels pour proposer des solutions simples, utiles et adaptées à votre contexte.</p><p>De la réflexion stratégique à la mise en ligne, puis à la prise en main par vos équipes, nous restons à vos côtés à chaque étape.</p>',
            ],
            'conseil' => [
                'title' => 'Conseil informatique et marketing stratégique',
                'meta_description' => 'Conseil informatique et marketing stratégique pour structurer votre projet numérique et gagner en visibilité.',
                'hero_title' => 'Conseil informatique et marketing stratégique',
                'hero_subtitle' => 'Des choix clairs pour vos outils, votre organisation et votre communication.',
                'content' => '<p>Avant de lancer un site, une application ou une campagne, il faut savoir où l\'on va. Nous analysons votre activité, vos objectifs et vos moyens pour définir une feuille de route réaliste.</p><h2>Notre approche</h2><ul><li>Écouter et comprendre votre activité</li><li>Choisir les outils adaptés à votre budget</li><li>Construire un plan d\'action concret</li><li>Définir votre positionnement et votre message</li></ul>',
            ],
            'developpement' => [
                'title' => 'Développement web et applications mobiles',
                'meta_description' => 'Création de sites web et d\'applications mobiles sur mesure, pensés pour être clairs, rapides et faciles à gérer.',
                'hero_title' => 'Sites web et applications mobiles',
                'hero_subtitle' => 'Des outils numériques conçus pour vos utilisateurs et faciles à faire évoluer.',
                'content' => '<p>Nous concevons des sites web et des applications mobiles accessibles, lisibles sur téléphone et simples à administrer. Chaque projet commence par un échange pour cadrer le besoin et les priorités.</p><h2>Ce que nous faisons</h2><ul><li>Sites vitrines et sites institutionnels</li><li>Applications web et applications mobiles</li><li>Espaces d\'administration pour gérer vos contenus</li><li>Évolutions et maintenance</li></ul>',
            ],
            'formation' => [
                'title' => 'Formation et assistance',
                'meta_description' => 'Formation et assistance pour aider vos équipes à maîtriser leurs outils numériques au quotidien.',
                'hero_title' => 'Formation et assistance',
                'hero_subtitle' => 'Pour que vos équipes soient autonomes avec leurs outils.',
                'content' => '<p>Un bon outil ne sert que s\'il est bien utilisé. Nous formons vos équipes à la pratique, avec des exemples tirés de leur travail, et restons disponibles pour répondre aux questions après la formation.</p><h2>Nos accompagnements</h2><ul><li>Formations sur les outils bureautiques et numériques</li><li>Prise en main de votre site ou de votre application</li><li>Assistance et dépannage</li></ul>',
            ],
            'actualites' => [
                'title' => 'Actualités',
                'meta_description' => 'Les actualités et conseils de DaerTech sur le numérique et le marketing.',
                'hero_title' => 'Actualités',
                'hero_subtitle' => 'Nouvelles, conseils et réflexions autour du numérique.',
                'content' => null,
            ],
            'contact' => [
                'title' => 'Contact',
                'meta_description' => 'Contactez DaerTech pour parler de votre projet numérique.',
                'hero_title' => 'Parlons de votre projet',
                'hero_subtitle' => 'Décrivez-nous votre besoin, nous revenons vers vous rapidement.',
                'content' => '<p>Utilisez le formulaire ci-dessous pour nous écrire. Plus votre message est précis, plus notre réponse sera utile.</p>',
            ],
        ];

        foreach ($pages as $slug => $data) {
            Page::firstOrCreate(['slug' => $slug], $data);
        }
    }
}
