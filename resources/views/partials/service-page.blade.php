@extends('layouts.app')
@section('title', $page->title)
@section('description', $page->meta_description)
@section('content')
<section class="hero page-hero"><div class="container">
  <h1>{{ $page->hero_title ?: $page->title }}</h1>
  @if($page->hero_subtitle)<p class="lead">{{ $page->hero_subtitle }}</p>@endif
  @if($page->image_url)<img class="hero-img" src="{{ $page->image_url }}" alt="" width="1120" height="420">@endif
</div></section>
@if(trim((string) $page->content) !== '')<section class="section"><div class="container">@include('partials.content', ['html' => $page->content])</div></section>@endif
@if($services->isNotEmpty())
<section class="section alt" aria-labelledby="svc"><div class="container">
  <h2 id="svc">Nos prestations</h2>
  <div class="grid cols-3">@foreach($services as $service)@include('partials.service-card')@endforeach</div>
</div></section>
@endif
@include('partials.cta')
@endsection
