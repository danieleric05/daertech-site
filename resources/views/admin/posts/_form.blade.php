@php $p = $post ?? null; @endphp
<form class="form" method="POST" action="{{ $p ? route('admin.posts.update', $p) : route('admin.posts.store') }}" enctype="multipart/form-data">@csrf @if($p) @method('PUT') @endif
<div class="field"><label for="title">Titre *</label><input id="title" name="title" value="{{ old('title', $p?->title) }}" required>@error('title')<div class="err">{{ $message }}</div>@enderror</div>
<div class="field"><label for="slug">Slug</label><input id="slug" name="slug" value="{{ old('slug', $p?->slug) }}">@error('slug')<div class="err">{{ $message }}</div>@enderror</div>
<div class="field"><label for="excerpt">Extrait</label><textarea id="excerpt" name="excerpt" rows="3">{{ old('excerpt', $p?->excerpt) }}</textarea>@error('excerpt')<div class="err">{{ $message }}</div>@enderror</div>
<div class="field"><label for="body">Contenu *</label><textarea id="body" name="body" rows="12" required>{{ old('body', $p?->body) }}</textarea>@error('body')<div class="err">{{ $message }}</div>@enderror</div>
<div class="row2">
<div class="field"><label for="status">Statut</label><select id="status" name="status">@foreach(['draft'=>'Brouillon','published'=>'Publié'] as $k=>$l)<option value="{{ $k }}" @selected(old('status', $p?->status ?? 'draft') === $k)>{{ $l }}</option>@endforeach</select>@error('status')<div class="err">{{ $message }}</div>@enderror</div>
<div class="field"><label for="published_at">Date de publication</label><input id="published_at" name="published_at" type="datetime-local" value="{{ old('published_at', $p?->published_at?->format('Y-m-d\TH:i')) }}">@error('published_at')<div class="err">{{ $message }}</div>@enderror</div>
</div>
@include('admin._image', ['current' => $p?->image_url])
<div><button class="btn" type="submit">Enregistrer</button> <a class="btn sec" href="{{ route('admin.posts.index') }}">Annuler</a></div></form>
