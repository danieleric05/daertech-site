@extends('layouts.app')
@section('title', $page->title)
@section('description', $page->meta_description)
@section('content')
<section class="hero"><div class="container">
  <p class="eyebrow">Conseil informatique et accompagnement</p>
  <h1>{{ $page->hero_title ?: 'Des outils informatiques adaptés à votre entreprise' }}</h1>
  <p class="lead">{{ $page->hero_subtitle ?: 'Nous aidons les entreprises à choisir, organiser et faire évoluer leurs outils informatiques.' }}</p>
  <div class="btn-row">
    <a class="btn" href="{{ route('contact') }}">Discuter de votre besoin</a>
    @if(!empty($settings['whatsapp']))<a class="btn btn-wa" href="https://wa.me/{{ $settings['whatsapp'] }}" rel="noopener noreferrer">Écrire sur WhatsApp</a>@endif
  </div>
  @if($page->image_url)<img class="hero-img" src="{{ $page->image_url }}" alt="" width="1120" height="420">@endif
</div></section>
@if($banner)<div class="container">@include('partials.banner')</div>@endif
@if(trim((string) $page->content) !== '')<section class="section"><div class="container">@include('partials.content', ['html' => $page->content])</div></section>@endif
<section class="section alt" aria-labelledby="svc"><div class="container">
  <div class="section-head"><h2 id="svc">Nos services</h2><p>Du choix des outils à leur mise en place, nous vous accompagnons selon votre réalité.</p></div>
  <div class="grid cols-3">@forelse($services as $service)@include('partials.service-card')@empty<p>Nos services seront bientôt détaillés ici.</p>@endforelse</div>
</div></section>
<section class="section" aria-labelledby="meth"><div class="container">
  <div class="section-head"><h2 id="meth">Notre méthode d'accompagnement</h2><p>Quatre étapes simples, pour avancer sans vous perdre dans la technique.</p></div>
  <ol class="steps">
    <li><h3>Écouter</h3><p>Nous comprenons votre activité, vos habitudes et vos difficultés actuelles.</p></li>
    <li><h3>Cadrer</h3><p>Nous définissons ensemble les priorités et les solutions adaptées à vos moyens.</p></li>
    <li><h3>Mettre en place</h3><p>Nous installons, configurons et formons vos équipes aux nouveaux outils.</p></li>
    <li><h3>Accompagner</h3><p>Nous restons disponibles pour faire évoluer vos outils avec votre entreprise.</p></li>
  </ol>
</div></section>
@if($posts->isNotEmpty())
<section class="section alt" aria-labelledby="news"><div class="container">
  <div class="section-head"><h2 id="news">Actualités</h2></div>
  <div class="grid cols-3">@foreach($posts as $post)
    <article class="card">@if($post->image_url)<img src="{{ $post->image_url }}" alt="" loading="lazy" width="640" height="360">@endif
      <h3><a href="{{ route('actualites.show', $post) }}">{{ $post->title }}</a></h3><p>{{ $post->excerpt }}</p></article>
  @endforeach</div>
  <p><a href="{{ route('actualites.index') }}">Toutes les actualités</a></p>
</div></section>
@endif
@include('partials.cta')
@endsection
