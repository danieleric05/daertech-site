<!DOCTYPE html>
<html lang="fr"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><meta name="robots" content="noindex,nofollow">
<title>Connexion | DaerTech</title><link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
<script>try{var t=localStorage.getItem('adm-theme');if(!t&&matchMedia('(prefers-color-scheme: dark)').matches)t='dark';if(t==='dark')document.documentElement.dataset.theme='dark'}catch(e){}</script>
<style>:root{--mark:url('{{ asset('img/logo-mark-dark.png') }}')}</style>
@fonts
@vite(['resources/css/app.css', 'resources/js/app.js'])</head>
<body class="admin"><main class="login"><div class="login-brand"><img src="{{ asset('img/logo-mark.png') }}" alt="" width="44" height="46"><span>DaerTech</span></div><div class="panel"><h1>Connexion</h1>@include('admin._flash')
<form class="form" method="POST" action="{{ route('admin.login') }}">@csrf
<div class="field"><label for="email">E-mail</label><input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus autocomplete="username"></div>
<div class="field"><label for="password">Mot de passe</label><input id="password" name="password" type="password" required autocomplete="current-password"></div>
<div><button class="btn" type="submit">Se connecter</button></div></form></div></main></body></html>
