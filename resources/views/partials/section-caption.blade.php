@props(['caption'])

<p class="eyebrow">
    @php($parts = explode(' ', trim($caption), 2))
    @if(str_starts_with($parts[0] ?? '', '/'))
        <span class="slash">/</span>{{ ' ' . ($parts[1] ?? ltrim($parts[0], '/')) }}
    @else
        {{ $caption }}
    @endif
</p>
