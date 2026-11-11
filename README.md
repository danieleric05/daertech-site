# Site DaerTech

Site vitrine dynamique de DaerTech (conseil informatique, marketing stratégique, sites web et applications mobiles), avec administration. Laravel 13, Blade, Tailwind CSS v4 (build Vite).

## Prérequis

PHP 8.3+ (extensions `mbstring`, `xml`, `gd`, `fileinfo`, `pdo_sqlite` ou `pdo_mysql`), Composer 2.

## Installation

```bash
composer install
npm install && npm run build   # génère public/build (CSS/JS, polices) ; requis, non versionné
cp .env.example .env
php artisan key:generate
```

Prérequis supplémentaire : Node.js 20+. En développement : `npm run dev`.

## Base de données

- **SQLite (défaut, développement)** : `touch database/database.sqlite`, rien d'autre à configurer.
- **MySQL (production)** : dans `.env`, mettre `DB_CONNECTION=mysql` et renseigner `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`.

Puis :

```bash
php artisan migrate
php artisan db:seed          # réglages, pages, services ; articles/bannière [DÉMO] hors production
php artisan storage:link     # nécessaire pour les images téléversées
```

## Compte administrateur

Deux options, sans mot de passe dans le dépôt :

1. Commande interactive (recommandée) : `php artisan daertech:create-admin vous@exemple.com --name="Votre nom"` (mot de passe demandé en saisie masquée).
2. Via `.env` : renseigner `ADMIN_EMAIL` et `ADMIN_PASSWORD`, lancer `php artisan db:seed --class=AdminUserSeeder`, puis **retirer `ADMIN_PASSWORD` du `.env`**.

Connexion : `/admin/login`.

## Lancement

```bash
php artisan serve
```

Site : http://127.0.0.1:8000 — Administration : http://127.0.0.1:8000/admin

## Contenu

- Les coordonnées (téléphone, WhatsApp, e-mail, adresse) et réseaux sociaux sont **vides par défaut** : renseignez-les dans *Admin → Réglages*. Le bouton WhatsApp et les blocs de coordonnées n'apparaissent qu'une fois renseignés. Format WhatsApp : numéro international sans `+` (ex. `225XXXXXXXXXX`).
- Les données de démonstration sont marquées `[DÉMO]` et fictives : à supprimer avant la mise en ligne.
- Contenu masqué du site public : services non publiés, articles non publiés ou à date future, bannières inactives, pas encore commencées ou expirées.

## Sécurité

- Administration protégée par authentification + `is_admin`, policies, limitation des tentatives de connexion.
- Formulaire de contact : validation, champ piège (honeypot), `throttle` 5 envois / 10 min.
- Téléversements : jpg, jpeg, png, webp, 2 Mo max (SVG refusé).
- Aucun secret versionné ; `.env` est ignoré.

## Tests et qualité

```bash
php artisan test
vendor/bin/pint --test
```

## Déploiement

Après mise à jour : `npm install && npm run build`, `php artisan migrate --force` puis `php artisan optimize:clear`. Pas de worker de queue ni de scheduler requis.
