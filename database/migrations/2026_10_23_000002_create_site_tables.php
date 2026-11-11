<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pages', function (Blueprint $t) {
            $t->id();
            $t->string('slug')->unique();
            $t->string('title');
            $t->string('meta_description')->nullable();
            $t->string('hero_title')->nullable();
            $t->string('hero_subtitle')->nullable();
            $t->text('content')->nullable();
            $t->string('image')->nullable();
            $t->timestamps();
        });

        Schema::create('services', function (Blueprint $t) {
            $t->id();
            $t->string('title');
            $t->string('slug')->unique();
            $t->string('summary');
            $t->text('description')->nullable();
            $t->string('icon')->default('conseil');
            $t->string('page_slug')->nullable()->index();
            $t->string('image')->nullable();
            $t->string('status')->default('draft')->index();
            $t->unsignedInteger('position')->default(0);
            $t->timestamps();
        });

        Schema::create('posts', function (Blueprint $t) {
            $t->id();
            $t->string('title');
            $t->string('slug')->unique();
            $t->string('excerpt', 500)->nullable();
            $t->text('body');
            $t->string('image')->nullable();
            $t->string('status')->default('draft');
            $t->dateTime('published_at')->nullable()->index();
            $t->timestamps();
        });

        Schema::create('banners', function (Blueprint $t) {
            $t->id();
            $t->string('title');
            $t->string('image')->nullable(); // requis par validation ; nullable en base pour les données de démo
            $t->string('text')->nullable();
            $t->string('link_url', 2048)->nullable();
            $t->string('placement')->index();
            $t->dateTime('starts_at')->nullable();
            $t->dateTime('ends_at')->nullable();
            $t->boolean('is_active')->default(true);
            $t->timestamps();
        });

        Schema::create('contact_messages', function (Blueprint $t) {
            $t->id();
            $t->string('name');
            $t->string('email');
            $t->string('phone')->nullable();
            $t->string('company')->nullable();
            $t->string('subject');
            $t->text('message');
            $t->string('ip', 45)->nullable();
            $t->timestamp('read_at')->nullable();
            $t->timestamps();
        });

        Schema::create('settings', function (Blueprint $t) {
            $t->id();
            $t->string('key')->unique();
            $t->text('value')->nullable();
            $t->timestamps();
        });
    }

    public function down(): void
    {
        foreach (['settings', 'contact_messages', 'banners', 'posts', 'services', 'pages'] as $table) {
            Schema::dropIfExists($table);
        }
    }
};
