@extends('layouts.app')
@section('title', 'Trop de requêtes')
@section('content')
<section class="hero page-hero"><div class="container"><h1>Trop de tentatives</h1><p class="lead">Vous avez effectué trop de demandes en peu de temps. Patientez quelques minutes, puis réessayez.</p><p><a class="btn" href="{{ url()->previous() }}">Retour</a></p></div></section>
@endsection
