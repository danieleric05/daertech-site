@extends('layouts.admin')
@section('title','Réglages')
@section('content')
<h1>Réglages</h1>
<form class="form" method="POST" action="{{ route('admin.settings.update') }}">@csrf @method('PUT')
@foreach(['company_name'=>'Nom de l\'entreprise','tagline'=>'Slogan','phone'=>'Téléphone','whatsapp'=>'WhatsApp (format international sans +, ex. 225...)','email'=>'E-mail','address'=>'Adresse','hours'=>'Horaires','facebook'=>'Facebook (URL)','linkedin'=>'LinkedIn (URL)','instagram'=>'Instagram (URL)','x'=>'X (URL)','youtube'=>'YouTube (URL)','tiktok'=>'TikTok (URL)'] as $k=>$l)
<div class="field"><label for="{{ $k }}">{{ $l }}</label><input id="{{ $k }}" name="{{ $k }}" @if(str_contains($l, '(URL)')) type="url" inputmode="url" @endif value="{{ old($k, $settings[$k] ?? '') }}" @error($k) aria-invalid="true" aria-describedby="{{ $k }}-e" @enderror>@error($k)<div class="err" id="{{ $k }}-e">{{ $message }}</div>@enderror</div>@endforeach
<div><button class="btn" type="submit">Enregistrer</button></div></form>
@endsection
