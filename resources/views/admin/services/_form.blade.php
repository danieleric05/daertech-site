@php $s = $service ?? null; @endphp
<form class="form" method="POST" action="{{ $s ? route('admin.services.update', $s) : route('admin.services.store') }}" enctype="multipart/form-data">@csrf @if($s) @method('PUT') @endif
<div class="field"><label for="title">Titre *</label><input id="title" name="title" value="{{ old('title', $s?->title) }}" required>@error('title')<div class="err">{{ $message }}</div>@enderror</div>
<div class="field"><label for="slug">Slug</label><input id="slug" name="slug" value="{{ old('slug', $s?->slug) }}">@error('slug')<div class="err">{{ $message }}</div>@enderror</div>
<div class="field"><label for="summary">Résumé *</label><textarea id="summary" name="summary" rows="3" required>{{ old('summary', $s?->summary) }}</textarea>@error('summary')<div class="err">{{ $message }}</div>@enderror</div>
<div class="field"><label for="description">Description</label><textarea id="description" name="description">{{ old('description', $s?->description) }}</textarea>@error('description')<div class="err">{{ $message }}</div>@enderror</div>
<div class="row2">
<div class="field"><label for="icon">Icône</label><select id="icon" name="icon">@foreach(['conseil','web','mobile','marketing','formation','assistance'] as $i)<option value="{{ $i }}" @selected(old('icon', $s?->icon) === $i)>{{ $i }}</option>@endforeach</select></div>
<div class="field"><label for="page_slug">Page d'affichage</label><select id="page_slug" name="page_slug"><option value="">Aucune</option>@foreach(['home','conseil','developpement','formation'] as $i)<option value="{{ $i }}" @selected(old('page_slug', $s?->page_slug) === $i)>{{ $i }}</option>@endforeach</select></div>
<div class="field"><label for="status">Statut</label><select id="status" name="status">@foreach(['draft'=>'Brouillon','published'=>'Publié','archived'=>'Archivé'] as $k=>$l)<option value="{{ $k }}" @selected(old('status', $s?->status ?? 'draft') === $k)>{{ $l }}</option>@endforeach</select>@error('status')<div class="err">{{ $message }}</div>@enderror</div>
<div class="field"><label for="position">Ordre</label><input id="position" name="position" type="number" min="0" value="{{ old('position', $s?->position ?? 0) }}"></div>
</div>
@include('admin._image', ['current' => $s?->image_url])
<div><button class="btn" type="submit">Enregistrer</button> <a class="btn sec" href="{{ route('admin.services.index') }}">Annuler</a></div></form>
