@if(!empty($banner))
@php $inner = '<img src="'.e($banner->image_url).'" alt="'.e($banner->title).'" loading="lazy">'.($banner->text ? '<p>'.e($banner->text).'</p>' : ''); @endphp
@if($banner->link_url)<a class="banner" href="{{ $banner->link_url }}" rel="noopener noreferrer">{!! $inner !!}</a>@else<div class="banner">{!! $inner !!}</div>@endif
@endif
