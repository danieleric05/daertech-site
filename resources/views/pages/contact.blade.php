@extends('layouts.app')
@section('title', $page->title)
@section('description', $page->meta_description)
@section('content')
<section class="hero page-hero"><div class="container"><h1>{{ $page->hero_title ?: $page->title }}</h1>@if($page->hero_subtitle)<p class="lead">{{ $page->hero_subtitle }}</p>@endif</div></section>
<section class="section dark"><div class="container contact-layout"><div class="glass">
  <p class="label">Qui vous répond</p>
  <p>C’est Daniel-Eric, fondateur de DaerTech, qui lit et répond à chaque message.</p>
  <ul class="chips"><li>Réponse sous 24 h ouvrées</li><li>Premier échange gratuit</li><li>Sans engagement</li></ul>
  <p class="after-send">Après l’envoi, Daniel-Eric vous recontacte par e-mail ou par téléphone pour convenir d’un premier échange.</p>
  @if(!empty($settings['whatsapp']))<p class="wa-line">La voie la plus rapide : écrivez-nous directement sur WhatsApp.</p><p><a class="btn btn-wa" href="https://wa.me/{{ $settings['whatsapp'] }}" rel="noopener noreferrer">Écrire sur WhatsApp</a></p><p class="label">Ou par formulaire</p>@endif
  <form class="form" id="contact-form" method="POST" action="{{ route('contact.send') }}">
    @csrf
    @if($errors->any())<div class="flash bad" role="alert">Le formulaire contient {{ $errors->count() }} {{ $errors->count() > 1 ? 'erreurs' : 'erreur' }} : corrigez les champs signalés.</div>@endif
    <div class="hp" aria-hidden="true"><label>Ne pas remplir<input type="text" name="website" tabindex="-1" autocomplete="off"></label></div>
    @php $f = [['name','Nom','text',true,'name',120],['email','E-mail','email',false,'email',190],['phone','Téléphone','tel',false,'tel',30],['company','Entreprise','text',false,'organization',150],['subject','Sujet','text',false,'off',190]]; @endphp
    @php $firstError = collect(array_column($f, 0))->push('message')->first(fn ($k) => $errors->has($k)); @endphp
    @foreach($f as [$n,$l,$t,$r,$ac,$max])
    <div class="field"><label for="{{ $n }}">{{ $l }}@if($r) <span aria-hidden="true">*</span>@endif</label>
      <input id="{{ $n }}" name="{{ $n }}" type="{{ $t }}" autocomplete="{{ $ac }}" maxlength="{{ $max }}" value="{{ old($n) }}" @if($r) required @endif @if($n === $firstError) autofocus @endif @php $d = trim(($n === 'email' || $n === 'phone' ? 'contact-h ' : '').($errors->has($n) ? $n.'-e' : '')); @endphp @if($errors->has($n)) aria-invalid="true" @endif @if($d) aria-describedby="{{ $d }}" @endif>
      @error($n)<div class="err" id="{{ $n }}-e">{{ $message }}</div>@enderror</div>
    @if($n === 'phone')<div class="hint" id="contact-h">E-mail ou téléphone : l'un des deux suffit.</div>@endif
    @endforeach
    <div class="field"><label for="message">Message <span aria-hidden="true">*</span></label>
      <textarea id="message" name="message" required @if($firstError === 'message') autofocus @endif maxlength="5000" placeholder="Ex. : Je tiens une boutique à Cocody et je voudrais un site pour présenter mes produits." @error('message') aria-invalid="true" aria-describedby="message-h message-e" @else aria-describedby="message-h" @enderror>{{ old('message') }}</textarea>
      <div class="hint" id="message-h">Quelques lignes suffisent : votre activité et ce que vous souhaitez (10 caractères minimum).</div>
      @error('message')<div class="err" id="message-e">{{ $message }}</div>@enderror</div>
    <div><button class="btn" type="submit">Envoyer</button></div>
  </form>
</div><div class="contact-art" aria-hidden="true"></div></div></section>
@endsection
