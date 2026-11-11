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
            'cookies' => [
                'title' => 'Politique de cookies',
                'meta_description' => 'Les cookies utilisés par le site DaerTech : uniquement des cookies strictement nécessaires, sans traceur ni mesure d\'audience.',
                'hero_title' => 'Politique de cookies',
                'hero_subtitle' => 'Ce que le site enregistre sur votre appareil, et pourquoi.',
                'content' => '<p><strong>Dernière mise à jour :</strong> 28 octobre 2026.</p><p>Cette page explique quels cookies et quelles données le site de DaerTech enregistre dans votre navigateur.</p><h2>En résumé</h2><p>Le site n\'utilise que des cookies strictement nécessaires à son fonctionnement. Il n\'utilise ni cookie publicitaire, ni outil de mesure d\'audience, ni traceur de réseau social. Ces cookies ne demandent pas votre consentement : le site n\'affiche donc pas de bandeau de cookies.</p><h2>Cookies utilisés</h2><ul><li><strong>Cookie de session</strong> : il maintient votre session de navigation et sécurise le formulaire de contact. Il expire environ deux heures après votre dernière visite.</li><li><strong>XSRF-TOKEN</strong> : jeton de sécurité qui protège le formulaire de contact contre les envois frauduleux. Il expire avec la session.</li></ul><h2>Stockage local de l\'administration</h2><p>L\'espace d\'administration, réservé à l\'équipe de DaerTech, mémorise le choix du mode clair ou sombre dans le stockage local du navigateur. Ce n\'est pas un cookie, cette information n\'est pas envoyée au serveur et elle ne concerne pas les visiteurs du site.</p><h2>Services tiers</h2><p>Les polices de caractères sont hébergées sur le site lui-même et le site ne charge aucun script d\'analyse. Les liens vers WhatsApp et les réseaux sociaux sont de simples liens : ils ne déposent rien sur votre appareil tant que vous ne les ouvrez pas. Une fois sur ces services, leurs propres règles s\'appliquent.</p><h2>Gérer ou supprimer les cookies</h2><p>Vous pouvez supprimer ou bloquer les cookies dans les réglages de votre navigateur. Le site reste consultable, mais l\'envoi du formulaire de contact peut alors être refusé.</p><h2>Une question ?</h2><p>Écrivez-nous depuis le formulaire de contact.</p>',
            ],
            'conditions' => [
                'title' => 'Conditions d\'utilisation',
                'meta_description' => 'Conditions d\'utilisation du site DaerTech : usage du site, propriété du contenu, formulaire de contact et limitation de responsabilité.',
                'hero_title' => 'Conditions d\'utilisation',
                'hero_subtitle' => 'Les règles simples qui encadrent l\'usage de ce site.',
                'content' => '<p><strong>Dernière mise à jour :</strong> 28 octobre 2026.</p><p>En utilisant le site de DaerTech, vous acceptez les conditions ci-dessous.</p><h2>Usage du site</h2><p>Le site présente les activités de DaerTech et permet de nous écrire. Vous vous engagez à l\'utiliser de manière légale et loyale. Il est interdit de chercher à perturber son fonctionnement, d\'accéder à l\'espace d\'administration sans autorisation ou d\'envoyer des messages automatisés ou abusifs.</p><h2>Propriété du contenu</h2><p>Les textes, le logo, les illustrations et l\'organisation du site sont la propriété de DaerTech, sauf mention contraire. Toute reproduction ou réutilisation sans autorisation écrite préalable est interdite.</p><h2>Formulaire de contact et données transmises</h2><p>Le formulaire collecte votre nom, votre adresse e-mail, un sujet et votre message. Le téléphone et l\'entreprise sont facultatifs. Votre adresse IP est enregistrée avec le message pour limiter les envois abusifs.</p><p>Ces informations servent uniquement à répondre à votre demande. Elles ne sont pas utilisées à des fins publicitaires. Vous pouvez nous demander de les consulter, de les corriger ou de les supprimer en nous écrivant par le formulaire de contact.</p><h2>Informations publiées</h2><p>Les pages du site décrivent notre offre à titre indicatif. Elles ne constituent pas un engagement contractuel : tout projet fait l\'objet d\'un échange et d\'un accord distincts.</p><h2>Limitation de responsabilité</h2><p>Nous veillons à la qualité des informations publiées, mais nous ne garantissons ni leur exactitude permanente, ni la disponibilité continue du site. Dans la limite permise par la loi, DaerTech ne peut être tenue responsable des dommages liés à l\'usage du site ou à son indisponibilité, ni du contenu des sites tiers vers lesquels il renvoie.</p><h2>Modification des conditions</h2><p>Ces conditions peuvent évoluer. La date de dernière mise à jour figure en haut de cette page.</p><h2>Contact</h2><p>Pour toute question, écrivez-nous depuis le formulaire de contact.</p>',
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
