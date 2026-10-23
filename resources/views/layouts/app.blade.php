@php
 $s = $settings ?? [];
 $name = $s['company_name'] ?? 'DaerTech';
 $nav = ['home'=>'Accueil','conseil'=>'Conseil informatique','developpement'=>'Web et applications','formation'=>'Formation et assistance','actualites.index'=>'Actualités'];
@endphp
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title', $name) | {{ $name }}</title>
<meta name="description" content="@yield('description', $s['tagline'] ?? '')">
<link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
@fonts
@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<a class="skip" href="#main">Aller au contenu</a>
<header class="site-header"><div class="container">
  <a class="brand" href="{{ route('home') }}" aria-label="{{ $name }}, accueil"><img src="{{ asset('img/logo-mark.png') }}" alt="" width="36" height="37"><span>DaerTech</span></a>
  <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="nav"><span class="sr-only">Menu</span><svg aria-hidden="true" viewBox="0 0 24 24" class="size-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path class="bar-open" d="M4 7h16M4 12h16M4 17h16"/><path class="bar-close" d="M6 6l12 12M18 6L6 18"/></svg></button>
  <nav class="nav" id="nav" aria-label="Navigation principale"><ul>
    @foreach($nav as $r => $label)<li><a href="{{ route($r) }}" @if(request()->routeIs($r) || ($r==='actualites.index' && request()->routeIs('actualites.*'))) aria-current="page" @endif>{{ $label }}</a></li>@endforeach
    <li><a class="btn" href="{{ route('contact') }}">Contact</a></li>
  </ul></nav>
</div></header>
<main id="main">@include('partials.flash')@yield('content')</main>
<footer class="site-footer"><div class="container">
  <div class="grid cols-3">
    <div><a class="brand" href="{{ route('home') }}"><img src="{{ asset('img/logo-mark.png') }}" alt="" width="36" height="37" loading="lazy"><span>DaerTech</span></a><p class="mt-4">{{ $s['tagline'] ?? '' }}</p></div>
    <div><h2>Coordonnées</h2><ul>
      @if(!empty($s['phone']))<li>Tél. : <a href="tel:{{ preg_replace('/[^+\d]/','',$s['phone']) }}">{{ $s['phone'] }}</a></li>@endif
      @if(!empty($s['email']))<li><a href="mailto:{{ $s['email'] }}">{{ $s['email'] }}</a></li>@endif
      @if(!empty($s['address']))<li>{{ $s['address'] }}</li>@endif
      @if(!empty($s['hours']))<li>{{ $s['hours'] }}</li>@endif
      <li><a href="{{ route('contact') }}">Formulaire de contact</a></li>
    </ul></div>
    @php $soc = ['facebook'=>'Facebook','linkedin'=>'LinkedIn','instagram'=>'Instagram','x'=>'X','youtube'=>'YouTube','tiktok'=>'TikTok']; $has = collect($soc)->keys()->contains(fn($k)=>!empty($s[$k])); @endphp
    @if($has)<div><h2>Réseaux</h2><ul>@foreach($soc as $k=>$l)@if(!empty($s[$k]))<li><a href="{{ $s[$k] }}" rel="noopener noreferrer" target="_blank">{{ $l }}<span class="sr-only"> (nouvel onglet)</span></a></li>@endif @endforeach</ul></div>@endif
  </div>
  <p class="small">&copy; {{ date('Y') }} {{ $name }}. Tous droits réservés.</p>
</div></footer>
@if(!empty($s['whatsapp']))<a class="wa-float" href="https://wa.me/{{ $s['whatsapp'] }}" rel="noopener noreferrer" aria-label="Discuter sur WhatsApp">WhatsApp</a>@endif
</body>
</html>
