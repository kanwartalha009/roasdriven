@props(['case'])

@php
    $tone = $case['hero_tone'] ?? 'lift';
    $metricColor = match($tone) {
        'pop'  => 'text-pop',
        'heat' => 'text-heat',
        default => 'text-lift',
    };
    $cornerBg = match($tone) {
        'pop'  => 'bg-pop',
        'heat' => 'bg-heat',
        default => 'bg-lift',
    };
@endphp

<a href="{{ route('work.show', $case['slug']) }}"
   class="group relative block rounded-2xl border border-rule bg-surface p-8 card-hover overflow-hidden">
    {{-- Colored corner accent (lime / pink / amber) --}}
    <span aria-hidden="true"
          class="absolute top-0 right-0 w-20 h-20 {{ $cornerBg }} rounded-bl-2xl"></span>

    {{-- Tags --}}
    <div class="relative flex flex-wrap items-center gap-2 mb-6">
        @foreach($case['tags'] as $tag)
            <span class="font-mono text-[11px] uppercase tracking-wider text-mute">{{ $tag }}</span>
            @if(!$loop->last)<span class="text-mute" aria-hidden="true">·</span>@endif
        @endforeach
    </div>

    {{-- Brand --}}
    <p class="font-mono text-caption uppercase tracking-wider text-mute mb-2">{{ $case['name'] }}</p>

    {{-- Hero metric --}}
    <p class="text-display-l font-display font-black {{ $metricColor }} leading-none tracking-tight">
        {{ $case['hero_metric'] }}
    </p>
    <p class="mt-3 font-mono text-caption uppercase tracking-wider text-white/70">
        {{ $case['hero_label'] }}
    </p>

    {{-- Descriptor --}}
    <p class="mt-6 text-white/70 leading-relaxed">{{ $case['descriptor'] }}</p>

    <div class="mt-8 inline-flex items-center gap-2 text-sm text-white group-hover:text-lift transition-colors">
        Read case study <span aria-hidden="true">↗</span>
    </div>
</a>
