@if(session('success'))<div class="flash ok" role="status">{{ session('success') }}</div>@endif
@if($errors->any())<div class="flash bad" role="alert"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif
