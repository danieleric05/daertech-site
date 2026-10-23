@extends('layouts.admin')
@section('title','Messages')
@section('content')
<h1>Messages</h1>
<div class="tw"><table><thead><tr><th>Date</th><th>De</th><th>Sujet</th><th></th></tr></thead><tbody>
@forelse($messages as $m)<tr @class(['unread' => !$m->isRead()])><td>{{ $m->created_at->format('d/m/Y H:i') }}</td><td>{{ $m->name }}</td><td>{{ $m->subject }}</td>
<td class="act"><a class="btn sec sm" href="{{ route('admin.messages.show', $m) }}">Lire</a> @include('admin._delete', ['action' => route('admin.messages.destroy', $m)])</td></tr>
@empty<tr><td colspan="4">Aucun message.</td></tr>@endforelse
</tbody></table></div>
@if(method_exists($messages,'links')){{ $messages->links() }}@endif
@endsection
