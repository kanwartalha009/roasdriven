@extends('layouts.app')

@section('title', 'Work — ROAS/Driven')
@section('description', 'Proof, not pitches. €50M+ in managed revenue per month, all currently on retainer. Case studies across the EU and LATAM.')

@section('content')

{{-- Hero --}}
<section class="relative overflow-hidden">
    <div aria-hidden="true" class="absolute inset-0 grid-bg opacity-60"></div>
    <div class="container-site relative pt-16 pb-16 md:pt-24 md:pb-24">
        @include('partials.section-caption', ['caption' => '/ WORK'])
        <h1 class="mt-6 text-display-xl font-display font-black leading-[0.92] tracking-tight max-w-[20ch]">
            Proof, not pitches.
        </h1>
        <p class="mt-8 max-w-3xl text-subhead text-white/80">
            Real brands, real numbers, real outcomes. Every brand on this page is currently on retainer with us — collectively shipping <span class="text-lift font-semibold">€50M+ in managed revenue per month</span>.
        </p>
    </div>
</section>

{{-- Featured case studies --}}
<section class="section">
    <div class="container-site">
        @include('partials.section-caption', ['caption' => '/ FEATURED'])
        <h2 class="mt-4 text-display-l font-display font-bold leading-tight mb-12">Three engagements, three outcomes.</h2>

        @if(count($cases))
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($cases as $case)
                    @include('partials.case-card', ['case' => $case])
                @endforeach
            </div>
        @endif
    </div>
</section>

{{-- ============================================================
   Full retainer roster — filterable by niche
============================================================ --}}
@if(!empty($brands))
<section class="section bg-surface-2" data-roster>
    <div class="container-site">
        <div class="mb-10">
            @include('partials.section-caption', ['caption' => '/ ON RETAINER'])
            <h2 class="mt-4 text-display-l font-display font-bold leading-tight max-w-[22ch]">
                €50M+ in managed revenue. Per month.
            </h2>
            <p class="mt-4 max-w-2xl text-white/70">
                Every brand below is currently on retainer. Apparel-heavy by design — we built our reputation in EU fashion, then expanded into footwear, jewelry, beauty, and home.
            </p>
        </div>

        {{-- Filter chips --}}
        <div class="flex flex-wrap items-center gap-2 mb-8 pb-6 border-b border-rule"
             role="group"
             aria-label="Filter brands by niche"
             data-roster-filters>
            <span class="font-mono text-caption uppercase tracking-wider text-mute mr-2">Filter:</span>

            <button type="button"
                    data-filter="all"
                    aria-pressed="true"
                    class="filter-chip is-active">
                All
            </button>

            @foreach($niches as $n)
                <button type="button"
                        data-filter="{{ $n['slug'] }}"
                        aria-pressed="false"
                        class="filter-chip">
                    {{ $n['label'] }}
                    <span class="ml-1 text-mute font-mono text-xs">{{ $n['count'] }}</span>
                </button>
            @endforeach
        </div>

        {{-- Brand cards (filtered client-side via data-niche) --}}
        <div data-roster-grid
             class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
            @foreach($brands as $brand)
                <a href="https://{{ $brand['domain'] }}"
                   target="_blank"
                   rel="noopener noreferrer"
                   data-brand-card
                   data-niche="{{ $brand['niche_slug'] }}"
                   class="group brand-card relative rounded-2xl border border-rule bg-surface p-6 flex flex-col justify-between min-h-[180px] card-hover">
                    <div>
                        <p class="font-display font-bold text-white leading-[1.05] tracking-tight text-2xl md:text-[28px] group-hover:text-lift transition-colors break-words">
                            {{ $brand['name'] }}
                        </p>
                    </div>
                    <div class="mt-6">
                        <p class="font-mono text-[11px] uppercase tracking-wider text-mute leading-tight">
                            {{ $brand['niche'] }}
                        </p>
                        <p class="mt-2 font-mono text-[11px] text-mute/70 truncate">
                            {{ $brand['domain'] }} <span aria-hidden="true" class="text-lift opacity-0 group-hover:opacity-100 transition-opacity">↗</span>
                        </p>
                    </div>
                </a>
            @endforeach
        </div>

        {{-- Empty state — shown via JS when no matches --}}
        <p data-roster-empty
           hidden
           class="mt-12 text-center text-mute font-mono text-caption uppercase tracking-wider">
            No brands match that filter.
        </p>
    </div>
</section>
@endif

@include('partials.cta-primary')

@endsection
