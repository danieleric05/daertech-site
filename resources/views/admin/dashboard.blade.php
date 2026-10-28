@extends('layouts.admin')
@section('title','Tableau de bord')
@section('content')
<h1>Tableau de bord</h1>
@php $c = $counts ?? []; $d = [['Messages non lus',$unreadMessages ?? ($c['unread'] ?? 0),'admin.messages.index'],['Articles publiés',$publishedPosts ?? ($c['published'] ?? 0),['admin.posts.index',['status'=>'published']]],['Brouillons',$draftPosts ?? ($c['drafts'] ?? 0),['admin.posts.index',['status'=>'draft']]],['Services',$services ?? ($c['services'] ?? 0),'admin.services.index'],['Bannières visibles',$visibleBanners ?? ($c['banners'] ?? 0),'admin.banners.index']]; @endphp
<div class="stats">@foreach($d as [$l,$n,$r])<a class="stat" href="{{ route(...(array) $r) }}"><b>{{ is_countable($n) ? count($n) : $n }}</b><span>{{ $l }}</span></a>@endforeach</div>
@endsection
