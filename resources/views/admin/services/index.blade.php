@extends('layouts.admin')
@section('title','Services')
@section('content')
@php $pageTitles = \App\Models\Page::pluck('title', 'slug'); @endphp
<div class="top"><h1>Services</h1><a class="btn" href="{{ route('admin.services.create') }}">Nouveau service</a></div>
<div class="tw"><table><thead><tr><th>Titre</th><th>Page</th><th>Statut</th><th>Ordre</th><th></th></tr></thead><tbody>
@forelse($services as $service)<tr><td>{{ $service->title }}</td><td>@if($service->page_slug){{ $pageTitles[$service->page_slug] ?? $service->page_slug }}@else<span class="badge off" title="Sans page, ce service n'apparaît pas sur le site">Sans page</span>@endif</td><td><span class="badge {{ $service->status }}">{{ $service->status_label }}</span></td><td>{{ $service->position }}</td>
<td class="act"><a class="btn sec sm" href="{{ route('admin.services.edit', $service) }}">Modifier</a>
@foreach(['published'=>['publish','Publier'],'archived'=>['archive','Archiver'],'draft'=>['draft','Brouillon']] as $st=>[$a,$l])@continue($service->status === $st)<form method="POST" action="{{ route('admin.services.status', $service) }}">@csrf @method('PATCH')<input type="hidden" name="status" value="{{ $a }}"><button class="btn sec sm" type="submit">{{ $l }}</button></form> @endforeach
@include('admin._delete', ['action' => route('admin.services.destroy', $service), 'msg' => "Supprimer le service « {$service->title} » définitivement ?"])</td></tr>
@empty<tr><td colspan="5">Aucun service.</td></tr>@endforelse
</tbody></table></div>
@endsection
