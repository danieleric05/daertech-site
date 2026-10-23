<article class="card">
  @if($service->image_url)<img src="{{ $service->image_url }}" alt="" loading="lazy" width="640" height="360">@else @include('partials.icon', ['name' => $service->icon]) @endif
  <h3>{{ $service->title }}</h3>
  <p>{{ $service->summary }}</p>
</article>
