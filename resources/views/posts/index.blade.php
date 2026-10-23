@extends('layouts.app')
@section('title', $page->title)
@section('description', $page->meta_description)
@section('content')
<section class="hero page-hero"><div class="container"><h1>{{ $page->hero_title ?: $page->title }}</h1>@if($page->hero_subtitle)<p class="lead">{{ $page->hero_subtitle }}</p>@endif</div></section>
<section class="section dark"><div class="container">
  @include('partials.banner')
  <div class="grid cols-3">@forelse($posts as $post)
    <article class="card" data-reveal>@if($post->image_url)<img src="{{ $post->image_url }}" alt="" loading="lazy" width="640" height="360">@endif
      <p class="meta"><time datetime="{{ optional($post->published_at)->toDateString() }}">{{ optional($post->published_at)->format('d/m/Y') }}</time></p>
      <h2 style="font-size:1.2rem"><a href="{{ route('actualites.show', $post) }}">{{ $post->title }}</a></h2>
      <p>{{ $post->excerpt }}</p><a class="more" href="{{ route('actualites.show', $post) }}">Lire l'article<span class="sr-only"> : {{ $post->title }}</span></a></article>
  @empty<p>Aucun article pour le moment.</p>@endforelse</div>
  @if($posts->hasPages())<nav aria-label="Pagination" style="margin-top:2rem">{{ $posts->links() }}</nav>@endif
</div></section>
@endsection
