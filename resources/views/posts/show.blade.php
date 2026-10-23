@extends('layouts.app')
@section('title', $post->title)
@section('description', $post->excerpt)
@section('content')
<section class="section"><div class="container layout-2">
  <article>
    <p><a href="{{ route('actualites.index') }}">&larr; Actualités</a></p>
    <h1>{{ $post->title }}</h1>
    <p class="meta"><time datetime="{{ optional($post->published_at)->toDateString() }}">{{ optional($post->published_at)->format('d/m/Y') }}</time></p>
    @if($post->image_url)<img src="{{ $post->image_url }}" alt="" style="border-radius:10px;margin-bottom:1.5rem" width="800" height="450">@endif
    <div class="prose">{!! nl2br(e($post->body)) !!}</div>
  </article>
  <aside aria-label="À lire aussi">
    @include('partials.banner')
    @if($related->isNotEmpty())<h2 style="font-size:1.2rem">À lire aussi</h2><ul>@foreach($related as $r)<li><a href="{{ route('actualites.show', $r) }}">{{ $r->title }}</a></li>@endforeach</ul>@endif
  </aside>
</div></section>
@endsection
