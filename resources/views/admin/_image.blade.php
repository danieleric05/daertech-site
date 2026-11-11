{{-- vars: $current (url|null) ; $required (bool) --}}
<div class="field"><label for="image">Image @if(!empty($required))*@endif</label>
<input id="image" type="file" name="image" accept="image/jpeg,image/png,image/webp" data-preview="img-prev" @error('image') aria-invalid="true" @enderror>
<span class="hint">JPG, PNG ou WebP, 2 Mo maximum.</span>
<img id="img-prev" class="preview" src="{{ $current ?? '' }}" alt="Aperçu" @if(empty($current)) hidden @endif>
@error('image')<div class="err">{{ $message }}</div>@enderror</div>
