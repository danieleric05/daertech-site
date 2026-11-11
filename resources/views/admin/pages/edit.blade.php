@extends('layouts.admin')
@section('title','Modifier la page')
@section('content')
<h1>Page : {{ $page->title }}</h1>
<form class="form" method="POST" action="{{ route('admin.pages.update', $page) }}" enctype="multipart/form-data">@csrf @method('PUT')
@foreach([['title','Titre'],['meta_description','Meta description'],['hero_title','Titre du bandeau'],['hero_subtitle','Sous-titre du bandeau']] as [$n,$l])
<div class="field"><label for="{{ $n }}">{{ $l }}</label><input id="{{ $n }}" name="{{ $n }}" value="{{ old($n, $page->$n) }}">@error($n)<div class="err">{{ $message }}</div>@enderror</div>@endforeach
<div class="field"><label for="content">Contenu</label><textarea id="content" name="content" rows="10">{{ old('content', $page->content) }}</textarea><span class="hint">HTML simple : p, br, strong, em, ul, ol, li, h2, h3.</span>@error('content')<div class="err">{{ $message }}</div>@enderror</div>
@include('admin._image', ['current' => $page->image_url])
<div><button class="btn" type="submit">Enregistrer</button> <a class="btn sec" href="{{ route('admin.pages.index') }}">Annuler</a></div></form>
@endsection
