<?php

namespace Tests\Feature;

use App\Models\Banner;
use App\Models\ContactMessage;
use App\Models\Post;
use App\Models\Service;
use App\Models\User;
use Database\Seeders\PageSeeder;
use Database\Seeders\SettingSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class SiteTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed([SettingSeeder::class, PageSeeder::class]);
    }

    private function admin(): User
    {
        return User::factory()->admin()->create();
    }

    public function test_public_pages_render(): void
    {
        foreach (['/', '/conseil-informatique', '/developpement-web-applications', '/formation-assistance', '/actualites', '/contact'] as $url) {
            $this->get($url)->assertOk();
        }
    }

    public function test_legal_pages_render_and_are_linked_in_footer(): void
    {
        $home = $this->get('/')->assertOk();
        $this->get('/politique-de-cookies')->assertOk()->assertSee('Politique de cookies')->assertSee('Dernière mise à jour');
        $this->get('/conditions-d-utilisation')->assertOk()->assertSee('Conditions d\'utilisation', false)->assertSee('Dernière mise à jour');

        $home->assertSee(route('cookies'), false)->assertSee(route('conditions'), false);
    }

    public function test_unpublished_and_future_posts_hidden(): void
    {
        $draft = Post::create(['title' => 'Brouillon', 'slug' => 'brouillon', 'body' => 'x', 'status' => 'draft']);
        $future = Post::create(['title' => 'Futur', 'slug' => 'futur', 'body' => 'x', 'status' => 'published', 'published_at' => now()->addDay()]);
        $ok = Post::create(['title' => 'Visible', 'slug' => 'visible', 'body' => 'x', 'status' => 'published', 'published_at' => now()->subDay()]);

        $this->get('/actualites/brouillon')->assertNotFound();
        $this->get('/actualites/futur')->assertNotFound();
        $this->get('/actualites/visible')->assertOk();
        $this->get('/actualites')->assertOk()->assertSee('Visible')->assertDontSee('Brouillon')->assertDontSee('Futur');
    }

    public function test_scopes_hide_expired_and_disabled(): void
    {
        $base = ['title' => 't', 'image' => 'i.png', 'placement' => 'home_top'];
        Banner::create($base + ['is_active' => false]);
        Banner::create($base + ['is_active' => true, 'ends_at' => now()->subMinute()]);
        Banner::create($base + ['is_active' => true, 'starts_at' => now()->addDay()]);
        $this->assertSame(0, Banner::visible()->count());
        Banner::create($base + ['is_active' => true, 'ends_at' => now()->addDay()]);
        $this->assertSame(1, Banner::visible()->count());

        Service::create(['title' => 'a', 'slug' => 'a', 'summary' => 's', 'status' => 'draft']);
        Service::create(['title' => 'b', 'slug' => 'b', 'summary' => 's', 'status' => 'archived']);
        $this->assertSame(0, Service::published()->count());
    }

    public function test_admin_is_protected(): void
    {
        $this->get('/admin')->assertRedirect(route('admin.login'));
        $this->actingAs(User::factory()->create())->get('/admin')->assertForbidden();
        $this->actingAs(User::factory()->create())->get('/admin/posts')->assertForbidden();
    }

    public function test_admin_pages_render(): void
    {
        $this->actingAs($this->admin());
        $svc = Service::create(['title' => 'a', 'slug' => 'a', 'summary' => 's', 'status' => 'draft']);
        $post = Post::create(['title' => 'p', 'slug' => 'p', 'body' => 'x', 'status' => 'draft']);
        $banner = Banner::create(['title' => 'b', 'image' => 'i.png', 'placement' => 'footer']);
        $msg = ContactMessage::create(['name' => 'n', 'email' => 'a@b.ci', 'subject' => 's', 'message' => 'm']);

        foreach ([
            route('admin.dashboard'), route('admin.pages.index'), route('admin.pages.edit', 1),
            route('admin.services.index'), route('admin.services.create'), route('admin.services.edit', $svc),
            route('admin.posts.index'), route('admin.posts.create'), route('admin.posts.edit', $post),
            route('admin.banners.index'), route('admin.banners.create'), route('admin.banners.edit', $banner),
            route('admin.messages.index'), route('admin.messages.show', $msg), route('admin.settings.edit'),
        ] as $url) {
            $this->get($url)->assertOk();
        }
        $this->assertTrue($msg->fresh()->isRead());
    }

    public function test_admin_login(): void
    {
        $this->get('/admin/login')->assertOk();
        User::factory()->admin()->create(['email' => 'a@daertech.test', 'password' => 'secret-pass-123']);
        $this->post('/admin/login', ['email' => 'a@daertech.test', 'password' => 'bad'])->assertSessionHasErrors('email');
        $this->post('/admin/login', ['email' => 'a@daertech.test', 'password' => 'secret-pass-123'])->assertRedirect(route('admin.dashboard'));
    }

    public function test_admin_service_status_and_post_publish(): void
    {
        $this->actingAs($this->admin());
        $svc = Service::create(['title' => 'a', 'slug' => 'a', 'summary' => 's', 'status' => 'draft']);
        $this->patch(route('admin.services.status', $svc), ['status' => 'publish'])->assertSessionHas('success');
        $this->assertSame('published', $svc->fresh()->status);

        $post = Post::create(['title' => 'p', 'slug' => 'p', 'body' => 'x', 'status' => 'draft']);
        $this->patch(route('admin.posts.publish', $post));
        $this->assertTrue($post->fresh()->isPublished());
    }

    public function test_contact_validation_and_honeypot(): void
    {
        $this->post('/contact', [])->assertSessionHasErrors(['name', 'email', 'subject', 'message']);

        $valid = ['name' => 'Awa', 'email' => 'awa@example.ci', 'subject' => 'Bonjour', 'message' => 'Un message assez long.'];
        $this->post('/contact', $valid)->assertSessionHas('success');
        $this->assertSame(1, ContactMessage::count());

        $this->post('/contact', $valid + ['website' => 'http://spam.test'])->assertSessionHas('success');
        $this->assertSame(1, ContactMessage::count());
    }

    public function test_contact_throttle_counts_only_valid_submissions(): void
    {
        for ($i = 0; $i < 6; $i++) {
            $this->post('/contact', [])->assertSessionHasErrors('name');
        }

        $valid = ['name' => 'Awa', 'email' => 'awa@example.ci', 'subject' => 'Bonjour', 'message' => 'Un message assez long.'];
        for ($i = 0; $i < 5; $i++) {
            $this->post('/contact', $valid)->assertSessionHas('success');
        }

        $this->post('/contact', $valid)->assertSessionHasErrors('message')->assertSessionMissing('success');
        $this->assertSame(5, ContactMessage::count());
    }

    public function test_429_page_is_in_french(): void
    {
        Route::get('/_t429', fn () => abort(429))->middleware('web');

        $this->get('/_t429')->assertStatus(429)->assertSee('Trop de tentatives');
    }

    public function test_admin_lists_show_french_labels_and_links(): void
    {
        $this->actingAs($this->admin());
        Service::create(['title' => 'Svc A', 'slug' => 'svc-a', 'summary' => 'x', 'status' => 'published', 'position' => 1]);
        Post::create(['title' => 'Art A', 'slug' => 'art-a', 'body' => 'x', 'status' => 'draft']);
        Banner::create(['title' => 'Ban A', 'placement' => 'home_top', 'is_active' => true]);

        $this->get('/admin')->assertOk()->assertSee(route('admin.messages.index'), false);
        $this->get('/admin/services')->assertOk()->assertSee('Publié')->assertSee('Sans page')->assertDontSee('>published<', false);
        $this->get('/admin/posts')->assertOk()->assertSee('Brouillon')->assertSee('Publier');
        Post::create(['title' => 'Art B', 'slug' => 'art-b', 'body' => 'x', 'status' => 'published', 'published_at' => now()->subDay()]);
        $this->get('/admin/posts?status=draft')->assertOk()->assertSee('Art A')->assertDontSee('Art B');
        $this->get('/admin/posts?status=published')->assertOk()->assertSee('Art B')->assertDontSee('Art A');
        $this->get('/admin/banners')->assertOk()->assertSee('Accueil (haut)');
        $this->get('/admin/messages')->assertOk()->assertSee('Aucun message pour le moment.');
        $this->get('/admin/settings')->assertOk()->assertSee('type="url"', false);
    }

    public function test_admin_has_dark_mode_toggle_and_public_site_does_not(): void
    {
        $this->get('/admin/login')->assertOk()->assertSee('adm-theme', false);

        $this->actingAs($this->admin());
        $this->get('/admin')->assertOk()->assertSee('theme-toggle', false)->assertSee('adm-theme', false);
        $this->get('/')->assertOk()->assertDontSee('adm-theme', false)->assertDontSee('theme-toggle', false);
    }
}
