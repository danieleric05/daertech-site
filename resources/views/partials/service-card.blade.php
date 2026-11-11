<article class="card svc t-{{ $service->icon }}" data-reveal>
  <div class="art">@if($service->image_url)<img src="{{ $service->image_url }}" alt="" loading="lazy" width="640" height="360">@else @include('partials.motif', ['name' => $service->icon]) @endif</div>
  <div class="svc-body">
    @include('partials.icon', ['name' => $service->icon])
    <h3>{{ $service->title }}</h3>
    <p>{{ $service->summary }}</p>
  </div>
</article>
