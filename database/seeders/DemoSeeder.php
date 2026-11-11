<?php

namespace Database\Seeders;

use App\Models\Banner;
use App\Models\Post;
use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DemoSeeder extends Seeder
{
    public function run(): void
    {
        foreach ([['Service exemple A', 'web'], ['Service exemple B', 'marketing']] as $i => [$t, $icon]) {
            $title = "[DÉMO] $t";
            Service::firstOrCreate(['slug' => Service::uniqueSlug($title)], [
                'title' => $title, 'icon' => $icon, 'page_slug' => 'home', 'status' => 'published',
                'summary' => 'Contenu de démonstration fictif, à remplacer.', 'description' => 'Contenu de démonstration fictif.',
                'position' => 100 + $i,
            ]);
        }

        foreach (range(1, 3) as $n) {
            $title = "[DÉMO] Article d'exemple $n";
            Post::firstOrCreate(['slug' => Post::uniqueSlug($title)], [
                'title' => $title,
                'excerpt' => 'Article de démonstration fictif.',
                'body' => "Ceci est un article de démonstration fictif.\n\nIl sert uniquement à vérifier la mise en page et sera supprimé avant la mise en ligne.",
                'status' => 'published',
                'published_at' => now()->subDays($n),
            ]);
        }

        $image = null;
        if (function_exists('imagecreatetruecolor')) {
            $im = imagecreatetruecolor(1200, 300);
            imagefill($im, 0, 0, imagecolorallocate($im, 30, 64, 120));
            ob_start();
            imagepng($im);
            Storage::disk('public')->put($image = 'demo/banner.png', ob_get_clean());
        }

        Banner::firstOrCreate(['title' => '[DÉMO] Bannière d\'exemple'], [
            'image' => $image, 'text' => 'Bannière de démonstration fictive', 'placement' => 'home_top', 'is_active' => true,
        ]);
    }
}
