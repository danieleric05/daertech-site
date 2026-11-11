<?php

namespace App\Providers;

use App\Models\Banner;
use App\Models\ContactMessage;
use App\Models\Post;
use App\Models\Service;
use App\Models\Setting;
use App\Policies\BannerPolicy;
use App\Policies\ContactMessagePolicy;
use App\Policies\PostPolicy;
use App\Policies\ServicePolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Gate::policy(Service::class, ServicePolicy::class);
        Gate::policy(Post::class, PostPolicy::class);
        Gate::policy(Banner::class, BannerPolicy::class);
        Gate::policy(ContactMessage::class, ContactMessagePolicy::class);

        View::composer(['layouts.*', 'pages.*', 'posts.*', 'partials.*', 'admin.*'], function ($view) {
            $view->with('settings', Setting::allKeyed());
        });
    }
}
