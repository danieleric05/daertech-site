<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\ContactMessage;
use App\Models\Post;
use App\Models\Service;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('admin.dashboard', [
            'unreadMessages' => ContactMessage::whereNull('read_at')->count(),
            'publishedPosts' => Post::published()->count(),
            'draftPosts' => Post::where('status', 'draft')->count(),
            'services' => Service::count(),
            'visibleBanners' => Banner::visible()->count(),
        ]);
    }
}
