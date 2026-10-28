<!DOCTYPE html>
<html lang="fr"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex,nofollow">
<title>@yield('title', 'Administration') | DaerTech</title>
<link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
<script>try{var t=localStorage.getItem('adm-theme');if(!t&&matchMedia('(prefers-color-scheme: dark)').matches)t='dark';if(t==='dark')document.documentElement.dataset.theme='dark'}catch(e){}</script>
<style>:root{--mark:url('{{ asset('img/logo-mark-dark.png') }}')}</style>
@fonts
@vite(['resources/css/app.css', 'resources/js/app.js'])</head>
<body class="admin"><div class="adm">
<aside class="side"><a class="logo" href="{{ route('admin.dashboard') }}"><img src="{{ asset('img/logo-mark.png') }}" alt="" width="30" height="31"><span>DaerTech</span><small>admin</small></a>
<nav aria-label="Administration">
@foreach(['admin.dashboard'=>['Tableau de bord','admin.dashboard'],'admin.pages.index'=>['Pages','admin.pages.*'],'admin.services.index'=>['Services','admin.services.*'],'admin.posts.index'=>['Articles','admin.posts.*'],'admin.banners.index'=>['Bannières','admin.banners.*'],'admin.messages.index'=>['Messages','admin.messages.*'],'admin.settings.edit'=>['Réglages','admin.settings.*']] as $r=>[$l,$p])
<a href="{{ route($r) }}" @if(request()->routeIs($p)) aria-current="page" @endif>{{ $l }}</a>@endforeach
<a href="{{ route('home') }}" target="_blank" rel="noopener">Voir le site</a></nav>
<button class="btn sec sm theme-toggle" type="button" aria-pressed="false" hidden>Mode sombre</button>
<form method="POST" action="{{ route('admin.logout') }}">@csrf<button class="btn sec sm" type="submit">Déconnexion</button></form></aside>
<main class="main">@include('admin._flash')@yield('content')</main></div></body></html>
