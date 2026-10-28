@extends('layouts.admin')
@section('title','Message')
@section('content')
<div class="top"><h1>{{ $message->subject }}</h1><a class="btn sec" href="{{ route('admin.messages.index') }}">Retour</a></div>
<div class="panel"><dl>
<dt><b>Nom</b></dt><dd>{{ $message->name }}</dd>
<dt><b>E-mail</b></dt><dd><a href="mailto:{{ $message->email }}">{{ $message->email }}</a></dd>
@if($message->phone)<dt><b>Téléphone</b></dt><dd>{{ $message->phone }}</dd>@endif
@if($message->company)<dt><b>Entreprise</b></dt><dd>{{ $message->company }}</dd>@endif
<dt><b>Reçu le</b></dt><dd>{{ $message->created_at->format('d/m/Y H:i') }}</dd></dl>
<p>{!! nl2br(e($message->message)) !!}</p>
@include('admin._delete', ['action' => route('admin.messages.destroy', $message), 'msg' => "Supprimer le message de {$message->name} définitivement ?"])</div>
@endsection
