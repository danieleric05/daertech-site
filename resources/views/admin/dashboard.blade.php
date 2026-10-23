@extends('layouts.admin')
@section('title','Tableau de bord')
@section('content')
<h1>Tableau de bord</h1>
@php $c = $counts ?? []; $d = [['Messages non lus',$unreadMessages ?? ($c['unread'] ?? 0)],['Articles publiés',$publishedPosts ?? ($c['published'] ?? 0)],['Brouillons',$draftPosts ?? ($c['drafts'] ?? 0)],['Services',$services ?? ($c['services'] ?? 0)],['Bannières visibles',$visibleBanners ?? ($c['banners'] ?? 0)]]; @endphp
<div class="stats">@foreach($d as [$l,$n])<div class="stat"><b>{{ is_countable($n) ? count($n) : $n }}</b><span>{{ $l }}</span></div>@endforeach</div>
@endsection
