@extends('layouts.admin')
@section('title','Articles')
@section('content')
<div class="top"><h1>Articles</h1><a class="btn" href="{{ route('admin.posts.create') }}">Nouvel article</a></div>
<div class="tw"><table><thead><tr><th>Titre</th><th>Statut</th><th>Publication</th><th></th></tr></thead><tbody>
@forelse($posts as $post)<tr><td>{{ $post->title }}</td><td><span class="badge {{ $post->status }}">{{ $post->status_label }}</span></td><td>{{ optional($post->published_at)->format('d/m/Y H:i') ?: '-' }}</td>
<td class="act"><a class="btn sec sm" href="{{ route('admin.posts.edit', $post) }}">Modifier</a>
<form method="POST" action="{{ route('admin.posts.publish', $post) }}">@csrf @method('PATCH')<button class="btn sec sm" type="submit">{{ $post->status === 'published' ? 'Repasser en brouillon' : 'Publier' }}</button></form>
@include('admin._delete', ['action' => route('admin.posts.destroy', $post), 'msg' => "Supprimer l'article « {$post->title} » définitivement ?"])</td></tr>
@empty<tr><td colspan="4">Aucun article.</td></tr>@endforelse
</tbody></table></div>
@if(method_exists($posts,'links')){{ $posts->links() }}@endif
@endsection
