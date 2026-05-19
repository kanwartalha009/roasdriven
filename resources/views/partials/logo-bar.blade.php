@php
    $caption  = $caption  ?? config('content.home.logo_bar_caption');
    $logos    = $logos    ?? config('content.home.logos');
    $carousel = $carousel ?? false;
    $count    = count($logos);

    // Slow, readable scroll: ~3.5 s per brand, capped at 240 s for a full loop.
    $duration = min(max($count * 3.5, 80), 240);
@endphp

<section class="section py-12 md:py-16 border-y border-rule overflow-hidden">
    <div class="container-site">
        <p class="eyebrow text-center mb-8">{{ $caption }}</p>
    </div>

    @if($carousel)
        {{-- Infinite-scroll marquee. Track is duplicated for a seamless loop. --}}
        <div class="marquee group" role="region" aria-label="Client logos" style="--marquee-duration: {{ $duration }}s;">
            <ul class="marquee-track">
                @foreach($logos as $logo)
                    <li class="marquee-item">
                        <a href="https://{{ $logo['domain'] }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           title="{{ $logo['domain'] }}"
                           class="block font-display font-bold text-white/65 hover:text-lift transition-colors uppercase tracking-tight whitespace-nowrap">
                            {{ $logo['name'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
            {{-- Duplicate for seamless loop (aria-hidden so screen readers don't read twice) --}}
            <ul class="marquee-track" aria-hidden="true">
                @foreach($logos as $logo)
                    <li class="marquee-item">
                        <span class="block font-display font-bold text-white/65 uppercase tracking-tight whitespace-nowrap">
                            {{ $logo['name'] }}
                        </span>
                    </li>
                @endforeach
            </ul>
        </div>
    @else
        {{-- Static grid fallback (used elsewhere) --}}
        <div class="container-site">
            <ul class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 items-center">
                @foreach($logos as $logo)
                    <li class="flex items-center justify-center py-6 border-r last:border-r-0 [&:nth-child(3n)]:border-r-0 sm:[&:nth-child(3n)]:border-r lg:[&:nth-child(3n)]:border-r last:[&]:border-r-0 border-rule">
                        <span class="font-display font-bold text-white/70 hover:text-white transition-colors duration-site ease-site uppercase tracking-tight">
                            {{ $logo['name'] }}
                        </span>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
</section>
