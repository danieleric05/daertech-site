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
  <div>
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
  <div class="hero-vis" aria-hidden="true">
    <div class="term">
      <div class="term-bar"><i></i><i></i><i></i><span>projet.php</span></div>
<pre><code><span class="c">// 1. comprendre votre besoin</span>
<span class="k">$projet</span> = <span class="o">Projet</span>::<span class="s">cadrer</span>(<span class="k">$besoin</span>);

<span class="c">// 2. choisir les bons outils</span>
<span class="k">$projet</span>-&gt;<span class="s">outils</span>([<span class="r">'web'</span>, <span class="r">'mobile'</span>]);

<span class="c">// 3. mettre en ligne</span>
<span class="k">$projet</span>-&gt;<span class="s">deployer</span>();<span class="cur"></span></code></pre>
      <div class="term-metrics">
        <div class="metric"><small>Performance</small><b style="--w:86%"></b></div>
        <div class="metric"><small>Fiabilité</small><b style="--w:94%"></b></div>
        <div class="metric"><small>Support</small><b style="--w:72%"></b></div>
      </div>
    </div>
    <span class="float-chip">En ligne</span>
  </div>
  @if($page->image_url)<img class="hero-img" src="{{ $page->image_url }}" alt="" width="1120" height="420">@endif
</div></section>
<section class="marquee" aria-label="Technologies">
  <div class="track">
    @foreach([0, 1] as $copy)
    <ul @if($copy) aria-hidden="true" @endif>@foreach(['Laravel','PHP','JavaScript','React','Flutter','MySQL','API REST','Tailwind CSS','WhatsApp Business','Linux','Git'] as $tech)<li>{{ $tech }}</li>@endforeach</ul>
    @endforeach
  </div>
</section>
@if($banner)<div class="band"><div class="container">@include('partials.banner')</div></div>@endif
@if(trim((string) $page->content) !== '')<section class="section"><div class="container">@include('partials.content', ['html' => $page->content])</div></section>@endif
<section class="section dark" aria-labelledby="svc"><div class="container">
  <div class="section-head" data-reveal><p class="label">01 / Services</p><h2 id="svc">Nos services</h2><p>Du choix des outils à leur mise en place, nous vous accompagnons selon votre réalité.</p></div>
  <div class="grid cols-3 bento">@forelse($services as $service)@include('partials.service-card')@empty<p>Nos services seront bientôt détaillés ici.</p>@endforelse</div>
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
  <div class="grid cols-3">@foreach($posts as $post)
    <article class="card" data-reveal>@if($post->image_url)<img src="{{ $post->image_url }}" alt="" loading="lazy" width="640" height="360">@endif
      <h3><a href="{{ route('actualites.show', $post) }}">{{ $post->title }}</a></h3><p>{{ $post->excerpt }}</p></article>
  @endforeach</div>
  <p><a href="{{ route('actualites.index') }}">Toutes les actualités</a></p>
</div></section>
@endif
@include('partials.cta')
@endsection
