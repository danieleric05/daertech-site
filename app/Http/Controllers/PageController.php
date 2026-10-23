<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Page;
use App\Models\Post;
use App\Models\Service;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home', [
            'page' => Page::where('slug', 'home')->firstOrFail(),
            'services' => Service::published()->where('page_slug', 'home')->get(),
            'posts' => Post::published()->latest('published_at')->take(3)->get(),
            'banner' => Banner::visible()->where('placement', 'home_top')->latest()->first(),
        ]);
    }

    public function conseil()
    {
        return $this->servicePage('conseil');
    }

    public function developpement()
    {
        return $this->servicePage('developpement');
    }

    public function formation()
    {
        return $this->servicePage('formation');
    }

    public function contact()
    {
        return view('pages.contact', ['page' => Page::where('slug', 'contact')->firstOrFail()]);
    }

    private function servicePage(string $slug)
    {
        return view('pages.'.$slug, [
            'page' => Page::where('slug', $slug)->firstOrFail(),
            'services' => Service::published()->where('page_slug', $slug)->get(),
        ]);
    }
}
