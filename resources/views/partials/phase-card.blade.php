@props(['phase'])

@php
    $tone = $phase['tone'] ?? 'lift';
    $color = match($tone) {
        'pop'   => 'text-pop',
        'heat'  => 'text-heat',
        'white' => 'text-white',
        default => 'text-lift',
    };
@endphp

<div class="rounded-2xl border border-rule bg-surface p-8 h-full card-hover">
    <p class="font-display font-black text-[64px] leading-none {{ $color }}">{{ $phase['n'] }}</p>
    <h3 class="mt-6 text-heading font-display font-bold">{{ $phase['title'] }}</h3>
    <p class="mt-3 text-white/70 leading-relaxed">{{ $phase['body'] }}</p>
</div>
