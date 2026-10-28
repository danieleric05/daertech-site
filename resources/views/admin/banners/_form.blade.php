@php $b = $banner ?? null; @endphp
<form class="form" method="POST" action="{{ $b ? route('admin.banners.update', $b) : route('admin.banners.store') }}" enctype="multipart/form-data">@csrf @if($b) @method('PUT') @endif
<div class="field"><label for="title">Titre *</label><input id="title" name="title" value="{{ old('title', $b?->title) }}" required>@error('title')<div class="err">{{ $message }}</div>@enderror</div>
<div class="field"><label for="text">Texte</label><input id="text" name="text" value="{{ old('text', $b?->text) }}">@error('text')<div class="err">{{ $message }}</div>@enderror</div>
<div class="field"><label for="link_url">Lien (http/https)</label><input id="link_url" name="link_url" type="url" value="{{ old('link_url', $b?->link_url) }}">@error('link_url')<div class="err">{{ $message }}</div>@enderror</div>
<div class="field"><label for="placement">Emplacement *</label><select id="placement" name="placement">@foreach(['home_top'=>'Accueil (haut)','sidebar'=>'Colonne latérale','footer'=>'Pied de page','actualites'=>'Actualités'] as $k=>$l)<option value="{{ $k }}" @selected(old('placement', $b?->placement) === $k)>{{ $l }}</option>@endforeach</select>@error('placement')<div class="err">{{ $message }}</div>@enderror</div>
<div class="row2">
<div class="field"><label for="starts_at">Début</label><input id="starts_at" name="starts_at" type="datetime-local" value="{{ old('starts_at', $b?->starts_at?->format('Y-m-d\TH:i')) }}">@error('starts_at')<div class="err">{{ $message }}</div>@enderror</div>
<div class="field"><label for="ends_at">Fin</label><input id="ends_at" name="ends_at" type="datetime-local" value="{{ old('ends_at', $b?->ends_at?->format('Y-m-d\TH:i')) }}">@error('ends_at')<div class="err">{{ $message }}</div>@enderror</div>
</div>
<div class="field"><input type="hidden" name="is_active" value="0"><label><input type="checkbox" name="is_active" value="1" @checked(old('is_active', $b?->is_active ?? true))> Active</label></div>
@include('admin._image', ['current' => $b?->image_url, 'required' => !$b])
<div><button class="btn" type="submit">Enregistrer</button> <a class="btn sec" href="{{ route('admin.banners.index') }}">Annuler</a></div></form>
