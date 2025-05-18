@if (Str::contains($file, 'http'))
<a href="{{ $file }}" target="_blank">
  <img src="{{ $file }}" alt="{{ $item->text }}" style="max-width: 100px;" class="img-thumbnail">
</a>
@else
-
@endif