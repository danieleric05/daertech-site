@extends('layouts.admin')
@section('title','Messages')
@section('content')
<h1>Messages</h1>
@if($messages->isEmpty())<p>Aucun message pour le moment.</p>@else
<div class="tw"><table><thead><tr><th>Date</th><th>De</th><th>Sujet</th><th></th></tr></thead><tbody>
@foreach($messages as $m)<tr @class(['unread' => !$m->isRead()])><td>{{ $m->created_at->format('d/m/Y H:i') }}</td><td>{{ $m->name }}</td><td>{{ $m->subject }}</td>
<td class="act"><a class="btn sec sm" href="{{ route('admin.messages.show', $m) }}">Lire</a> @include('admin._delete', ['action' => route('admin.messages.destroy', $m), 'msg' => "Supprimer le message de {$m->name} définitivement ?"])</td></tr>
@endforeach
</tbody></table></div>
@endif
@if(method_exists($messages,'links')){{ $messages->links() }}@endif
@endsection
