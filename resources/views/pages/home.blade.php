@extends('layouts.app')
@section('title', $page->title)
@section('description', $page->meta_description)
@section('content')
@php
 $title = $page->hero_title ?: 'Des outils informatiques adaptés à votre entreprise';
 $words = preg_split('/\s+/', trim($title));
 $k = count($words) > 3 ? 2 : 1;
 $head = e(implode(' ', array_slice($words, 0, -$k)));
 $tail = e(implode(' ', array_slice($words, -$k)));
@endphp
<section class="hero"><div class="container">
  <div class="hero-copy">
    <p class="eyebrow">Conseil informatique et accompagnement</p>
    <h1>{!! $head !!} <span class="grad">{!! $tail !!}</span></h1>
    <p class="lead">{{ $page->hero_subtitle ?: 'Nous aidons les entreprises à choisir, organiser et faire évoluer leurs outils informatiques.' }}</p>
    <div class="btn-row">
      <a class="btn" href="{{ route('contact') }}">Discuter de votre besoin</a>
      @if(!empty($settings['whatsapp']))<a class="btn btn-wa" href="https://wa.me/{{ $settings['whatsapp'] }}" rel="noopener noreferrer">Écrire sur WhatsApp</a>@endif
    </div>
    <ul class="chips">
      <li>Solutions adaptées à vos moyens</li>
      <li>Équipes formées</li>
      <li>Suivi dans la durée</li>
    </ul>
  </div>
  <div class="hero-vis">
    <div class="stage">
      <div class="st-flower" aria-hidden="true"></div>
      <svg class="st-wires" viewBox="0 0 100 100" fill="none" focusable="false" aria-hidden="true">
        <g class="wires">
          <path class="w-b" d="M12 26V12H3"/>
          <path class="w-t" d="M88 26V10H97"/>
          <path class="w-o" d="M70 84V94H92"/>
          <path class="w-r" d="M30 84V92H14"/>
        </g>
        <g class="wnodes">
          <path class="n-b" d="M3 9.6 5.1 10.8V13.2L3 14.4 0.9 13.2V10.8z"/>
          <path class="n-t" d="M97 7.6 99.1 8.8V11.2L97 12.4 94.9 11.2V8.8z"/>
          <path class="n-o" d="M92 91.6 94.1 92.8V95.2L92 96.4 89.9 95.2V92.8z"/>
        </g>
      </svg>
      <div class="pt-frame">
        <div class="pt-photo">
          <img src="{{ asset('img/portrait-960.webp') }}" srcset="{{ asset('img/portrait-640.webp') }} 640w, {{ asset('img/portrait-960.webp') }} 960w" sizes="(min-width: 64rem) 30rem, 80vw" width="960" height="1107" alt="Portrait du fondateur de DaerTech" loading="eager" fetchpriority="high" decoding="async">
        </div>
      </div>
    </div>
  </div>
  @if($page->image_url)<img class="hero-img" src="{{ $page->image_url }}" alt="" width="1120" height="420">@endif
</div></section>
<section class="marquee" aria-label="Technologies">
  <div class="track">
    @foreach([0, 1] as $copy)
    <ul @if($copy) aria-hidden="true" @endif>@foreach(['Laravel','PHP','JavaScript','React','Flutter','MySQL','API REST','Tailwind CSS','Git'] as $tech)<li>{{ $tech }}</li>@endforeach</ul>
    @endforeach
  </div>
</section>
<section class="section eng-sec" aria-labelledby="eng"><div class="container">
  <h2 class="sr-only" id="eng">Nos engagements</h2>
  <ul class="eng-grid">
    <li class="eng t-conseil" data-reveal><h3><span class="eng-fig" aria-hidden="true">A–Z</span><span>De A à Z</span></h3><p>Du conseil à la mise en ligne, puis à la prise en main par vos équipes.</p></li>
    <li class="eng t-web" data-reveal><h3><span class="eng-fig">4</span><span>étapes</span></h3><p>Écouter, cadrer, mettre en place, accompagner.</p></li>
    <li class="eng t-formation" data-reveal><h3><span class="eng-fig">3</span><span>domaines</span></h3><p>Conseil, web et applications, formation et assistance.</p></li>
  </ul>
</div></section>
@if($banner)<div class="band"><div class="container">@include('partials.banner')</div></div>@endif
@if(trim((string) $page->content) !== '')<section class="section"><div class="container">@include('partials.content', ['html' => $page->content])</div></section>@endif
<section class="section dark" aria-labelledby="svc"><div class="container">
  <div class="section-head" data-reveal><p class="label">01 / Services</p><h2 id="svc">Nos services</h2><p>Du choix des outils à leur mise en place, nous vous accompagnons selon votre réalité.</p></div>
  @php $routes = ['conseil'=>'conseil','marketing'=>'conseil','web'=>'developpement','mobile'=>'developpement','formation'=>'formation','assistance'=>'formation']; @endphp
  <ol class="svc-list">@forelse($services as $service)
    <li data-reveal><a href="{{ route($routes[$service->icon] ?? 'contact') }}" class="svc-row t-{{ $service->icon }}">
      <span class="svc-n" aria-hidden="true">{{ sprintf('%02d', $loop->iteration) }}</span>
      <div class="svc-t"><h3>{{ $service->title }}</h3><p>{{ $service->summary }}</p></div>
      <svg class="svc-go" aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
    </a></li>
  @empty<li><p>Nos services seront bientôt détaillés ici.</p></li>@endforelse</ol>
</div></section>
<section class="section alt" aria-labelledby="meth"><div class="container">
  <div class="section-head" data-reveal><p class="label">02 / Méthode</p><h2 id="meth">Notre méthode d'accompagnement</h2><p>Quatre étapes simples, pour avancer sans vous perdre dans la technique.</p></div>
  <ol class="steps">
    <li data-reveal><h3>Écouter</h3><p>Nous comprenons votre activité, vos habitudes et vos difficultés actuelles.</p></li>
    <li data-reveal><h3>Cadrer</h3><p>Nous définissons ensemble les priorités et les solutions adaptées à vos moyens.</p></li>
    <li data-reveal><h3>Mettre en place</h3><p>Nous installons, configurons et formons vos équipes aux nouveaux outils.</p></li>
    <li data-reveal><h3>Accompagner</h3><p>Nous restons disponibles pour faire évoluer vos outils avec votre entreprise.</p></li>
  </ol>
</div></section>
@if($posts->isNotEmpty())
<section class="section dark" aria-labelledby="news"><div class="container">
  <div class="section-head" data-reveal><p class="label">03 / Actualités</p><h2 id="news">Actualités</h2></div>
  <div class="grid cols-3 news">@foreach($posts as $post)
    <article class="card" data-reveal><div class="art @unless($post->image_url) cover @endunless">@if($post->image_url)<img src="{{ $post->image_url }}" alt="" loading="lazy" width="640" height="360">@endif</div>
      <h3><a href="{{ route('actualites.show', $post) }}">{{ $post->title }}</a></h3><p>{{ $post->excerpt }}</p></article>
  @endforeach</div>
  <p class="more-link"><a href="{{ route('actualites.index') }}">Toutes les actualités</a></p>
</div></section>
@endif
@include('partials.cta')
@endsection
