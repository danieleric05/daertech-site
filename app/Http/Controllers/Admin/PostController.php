<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostRequest;
use App\Models\Post;
use App\Support\ImageUploader;
use Illuminate\Routing\Controllers\HasMiddleware;

class PostController extends Controller implements HasMiddleware
{
    use AuthorizesResource;

    private const MODEL = Post::class;

    private const PARAM = 'post';

    public function index()
    {
        return view('admin.posts.index', ['posts' => Post::latest('id')->paginate(20)]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(PostRequest $request)
    {
        $data = $this->data($request);
        $data['slug'] = Post::uniqueSlug($data['slug'] ?? $data['title']);
        if ($request->hasFile('image')) {
            $data['image'] = ImageUploader::replace($request->file('image'), 'posts');
        }
        Post::create($data);

        return redirect()->route('admin.posts.index')->with('success', 'Article créé.');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(PostRequest $request, Post $post)
    {
        $data = $this->data($request);
        $data['slug'] = $data['slug'] ?? $post->slug;
        if ($request->hasFile('image')) {
            $data['image'] = ImageUploader::replace($request->file('image'), 'posts', $post->image);
        } elseif ($request->boolean('remove_image')) {
            ImageUploader::delete($post->image);
            $data['image'] = null;
        }
        $post->update($data);

        return redirect()->route('admin.posts.index')->with('success', 'Article mis à jour.');
    }

    public function destroy(Post $post)
    {
        ImageUploader::delete($post->image);
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Article supprimé.');
    }

    /** Bascule publié / brouillon. */
    public function publish(Post $post)
    {
        $this->authorize('update', $post);

        if ($post->status === 'published') {
            $post->update(['status' => 'draft']);
            $msg = 'Article repassé en brouillon.';
        } else {
            $post->update(['status' => 'published', 'published_at' => $post->published_at ?? now()]);
            $msg = 'Article publié.';
        }

        return back()->with('success', $msg);
    }

    private function data(PostRequest $request): array
    {
        $data = $request->safe()->except(['image', 'remove_image']);
        $data['slug'] = filled($data['slug'] ?? null) ? $data['slug'] : null;
        if ($data['status'] === 'published' && blank($data['published_at'] ?? null)) {
            $data['published_at'] = now();
        }

        return $data;
    }
}
