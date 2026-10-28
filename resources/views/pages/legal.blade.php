@extends('layouts.app')
@section('title', $page->title)
@section('description', $page->meta_description)
@section('content')
<section class="hero page-hero"><div class="container">
  <h1>{{ $page->hero_title ?: $page->title }}</h1>
  @if($page->hero_subtitle)<p class="lead">{{ $page->hero_subtitle }}</p>@endif
</div></section>
<section class="section legal-page"><div class="container">
  @include('partials.content', ['html' => $page->content])
  <p class="mt-8"><a class="btn" href="{{ route('contact') }}">Nous écrire</a></p>
</div></section>
@endsection
