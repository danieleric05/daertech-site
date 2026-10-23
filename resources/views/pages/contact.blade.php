@extends('layouts.app')
@section('title', $page->title)
@section('description', $page->meta_description)
@section('content')
<section class="hero page-hero"><div class="container"><h1>{{ $page->hero_title ?: $page->title }}</h1>@if($page->hero_subtitle)<p class="lead">{{ $page->hero_subtitle }}</p>@endif</div></section>
<section class="section dark"><div class="container contact-layout"><div class="glass">
  @if(!empty($settings['whatsapp']))<p><a class="btn btn-wa" href="https://wa.me/{{ $settings['whatsapp'] }}" rel="noopener noreferrer">Écrire sur WhatsApp</a></p>@endif
  <form class="form" method="POST" action="{{ route('contact.send') }}" novalidate>
    @csrf
    <div class="hp" aria-hidden="true"><label>Ne pas remplir<input type="text" name="website" tabindex="-1" autocomplete="off"></label></div>
    @php $f = [['name','Nom','text',true],['email','E-mail','email',true],['phone','Téléphone','tel',false],['company','Entreprise','text',false],['subject','Sujet','text',true]]; @endphp
    @foreach($f as [$n,$l,$t,$r])
    <div class="field"><label for="{{ $n }}">{{ $l }}@if($r) <span aria-hidden="true">*</span>@endif</label>
      <input id="{{ $n }}" name="{{ $n }}" type="{{ $t }}" value="{{ old($n) }}" @if($r) required @endif @error($n) aria-invalid="true" aria-describedby="{{ $n }}-e" @enderror>
      @error($n)<div class="err" id="{{ $n }}-e">{{ $message }}</div>@enderror</div>
    @endforeach
    <div class="field"><label for="message">Message <span aria-hidden="true">*</span></label>
      <textarea id="message" name="message" required @error('message') aria-invalid="true" aria-describedby="message-e" @enderror>{{ old('message') }}</textarea>
      @error('message')<div class="err" id="message-e">{{ $message }}</div>@enderror</div>
    <div><button class="btn" type="submit">Envoyer</button></div>
  </form>
</div><div class="contact-art" aria-hidden="true"></div></div></section>
@endsection
