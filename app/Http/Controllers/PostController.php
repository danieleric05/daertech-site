<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Page;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'page' => Page::where('slug', 'actualites')->firstOrFail(),
            'posts' => Post::published()->latest('published_at')->paginate(9),
            'banner' => Banner::visible()->where('placement', 'actualites')->latest()->first(),
        ]);
    }

    public function show(Post $post)
    {
        abort_unless($post->isPublished(), 404);

        return view('posts.show', [
            'post' => $post,
            'related' => Post::published()->whereKeyNot($post->id)->latest('published_at')->take(3)->get(),
            'banner' => Banner::visible()->where('placement', 'sidebar')->latest()->first(),
        ]);
    }
}
