@extends('layouts.admin')
@section('title','Bannières')
@section('content')
<div class="top"><h1>Bannières</h1><a class="btn" href="{{ route('admin.banners.create') }}">Nouvelle bannière</a></div>
<div class="tw"><table><thead><tr><th>Image</th><th>Titre</th><th>Emplacement</th><th>Période</th><th>Active</th><th></th></tr></thead><tbody>
@forelse($banners as $banner)<tr><td>@if($banner->image_url)<img class="thumb" src="{{ $banner->image_url }}" alt="" loading="lazy">@endif</td><td>{{ $banner->title }}</td><td>{{ $banner->placement }}</td>
<td>{{ optional($banner->starts_at)->format('d/m/Y H:i') ?: '...' }} - {{ optional($banner->ends_at)->format('d/m/Y H:i') ?: '...' }}</td>
<td><span class="badge {{ $banner->is_active ? 'ok' : 'off' }}">{{ $banner->is_active ? 'Oui' : 'Non' }}</span></td>
<td class="act"><a class="btn sec sm" href="{{ route('admin.banners.edit', $banner) }}">Modifier</a> @include('admin._delete', ['action' => route('admin.banners.destroy', $banner)])</td></tr>
@empty<tr><td colspan="6">Aucune bannière.</td></tr>@endforelse
</tbody></table></div>
@endsection
