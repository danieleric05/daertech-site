@extends('layouts.admin')
@section('title','Pages')
@section('content')
<h1>Pages</h1>
<div class="tw"><table><thead><tr><th>Titre</th><th>Slug</th><th></th></tr></thead><tbody>
@foreach($pages as $page)<tr><td>{{ $page->title }}</td><td>{{ $page->slug }}</td><td class="act"><a class="btn sm" href="{{ route('admin.pages.edit', $page) }}">Modifier</a></td></tr>@endforeach
</tbody></table></div>
@endsection
