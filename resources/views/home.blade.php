@extends('layouts.app')

@section('title', 'ROAS/Driven — Ecommerce that prints revenue, not promises.')
@section('description', "The senior growth team behind Ölend, Flabelus, Banoffee BCN and a handful of other ambitious Spanish brands. Paid, CRO, lifecycle, Shopify, and creative — under one P&L. Barcelona-built, EU + LATAM.")

@section('content')

{{-- ========== 5.1 HERO ========== --}}
<section class="relative overflow-hidden">
    {{-- Lime + pink glow blobs match the mockup --}}
    <div aria-hidden="true" class="absolute inset-0 glow-bg"></div>
    <div aria-hidden="true" class="absolute inset-0 grid-bg opacity-50"></div>

    <div class="container-site relative pt-16 pb-20 md:pt-24 md:pb-28 lg:pt-32 lg:pb-36 min-h-[80vh] flex flex-col justify-center">
        @include('partials.section-caption', ['caption' => $home['hero']['eyebrow']])

        <h1 class="mt-6 text-display-xl font-display font-black leading-[0.92] tracking-tight max-w-[16ch]">
            @if(!empty($home['hero']['headline_parts']))
                @foreach($home['hero']['headline_parts'] as $part)
                    @if(($part['tone'] ?? null) === 'lift')
                        <span class="text-lift">{{ $part['text'] }}</span>
                    @elseif(($part['tone'] ?? null) === 'pop')
                        <span class="text-pop">{{ $part['text'] }}</span>
                    @else
                        <span>{{ $part['text'] }}</span>
                    @endif
                @endforeach
            @else
                {{ $home['hero']['headline'] }}
            @endif
        </h1>

        <p class="mt-8 max-w-3xl text-subhead text-white/80 leading-relaxed">
            {{ $home['hero']['sub'] }}
        </p>

        <div class="mt-10 flex flex-wrap gap-4">
            <a href="{{ route($home['hero']['cta_primary']['route']) }}" class="btn-primary">
                {{ $home['hero']['cta_primary']['label'] }} <span aria-hidden="true">↗</span>
            </a>
            <a href="{{ route($home['hero']['cta_secondary']['route']) }}" class="btn-ghost">
                {{ $home['hero']['cta_secondary']['label'] }} <span aria-hidden="true">↗</span>
            </a>
        </div>
    </div>
</section>

{{-- ========== 5.2 HERO METRIC STRIP ========== --}}
<section class="section pt-0">
    <div class="container-site">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($home['metrics'] as $metric)
                @include('partials.metric-card', ['metric' => $metric])
            @endforeach
        </div>

        {{-- Secondary stats row — flat, no chrome, big numbers --}}
        @if(!empty($home['stats']))
            <dl class="mt-4 grid grid-cols-2 md:grid-cols-4 gap-4 rounded-2xl border border-rule bg-surface px-6 py-8">
                @foreach($home['stats'] as $stat)
                    <div class="border-r last:border-r-0 md:[&:nth-child(2)]:border-r md:[&:nth-child(4)]:border-r-0 border-rule pr-4">
                        <dt class="font-mono text-caption uppercase tracking-wider text-mute">{{ $stat['label'] }}</dt>
                        <dd class="mt-2 font-display font-black text-display-m leading-none tracking-tight">{{ $stat['value'] }}</dd>
                    </div>
                @endforeach
            </dl>
        @endif
    </div>
</section>

{{-- ========== 5.3 LOGO BAR (infinite-scroll marquee, full client roster) ========== --}}
@include('partials.logo-bar', ['logos' => $allClients, 'carousel' => true])

{{-- ========== 5.4 SIX DISCIPLINES ========== --}}
<section class="section">
    <div class="container-site">
        <div class="grid lg:grid-cols-[1fr_2fr] gap-12 mb-16">
            <div>
                @include('partials.section-caption', ['caption' => $home['disciplines']['caption']])
                <h2 class="mt-4 text-display-l font-display font-bold leading-tight">
                    {{ $home['disciplines']['headline'] }}
                </h2>
            </div>
            <p class="text-subhead text-white/80 leading-relaxed max-w-2xl self-end">
                {{ $home['disciplines']['sub'] }}
            </p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach(array_slice($disciplines, 0, 6) as $d)
                @include('partials.service-card', ['discipline' => $d])
            @endforeach
        </div>
    </div>
</section>

{{-- ========== 5.5 THE POINT (editorial break) ========== --}}
<section class="bg-paper text-ink py-24 md:py-32">
    <div class="container-site">
        @include('partials.section-caption', ['caption' => $home['editorial_break']['eyebrow']])
        <h2 class="mt-6 text-display-xl font-display font-black tracking-tight leading-[0.95] text-ink max-w-[16ch]">
            We move <span class="text-pop">numbers.</span><br>
            <span class="line-through decoration-ink decoration-[6px] underline-offset-[-0.15em]">Not</span> vibes.
        </h2>
        <p class="mt-10 text-subhead text-ink/80 leading-relaxed max-w-3xl">
            {{ $home['editorial_break']['body'] }}
        </p>
    </div>
</section>

{{-- ========== 5.6 PROOF, NOT PITCHES ========== --}}
<section class="section">
    <div class="container-site">
        <div class="flex flex-wrap items-end justify-between gap-6 mb-12">
            <div>
                @include('partials.section-caption', ['caption' => $home['proof']['caption']])
                <h2 class="mt-4 text-display-l font-display font-bold leading-tight">
                    {{ $home['proof']['headline'] }}
                </h2>
            </div>
            <a href="{{ route('work.index') }}" class="text-sm text-white hover:text-lift transition-colors">
                All case studies <span aria-hidden="true">↗</span>
            </a>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($cases as $case)
                @include('partials.case-card', ['case' => $case])
            @endforeach
        </div>
    </div>
</section>

{{-- ========== 5.7 HOW WE OPERATE ========== --}}
<section class="relative section">
    <div aria-hidden="true" class="absolute inset-0 grid-bg opacity-40"></div>
    <div class="container-site relative">
        <div class="grid lg:grid-cols-[1fr_2fr] gap-12 mb-16">
            <div>
                @include('partials.section-caption', ['caption' => $home['how']['caption']])
                <h2 class="mt-4 text-display-l font-display font-bold leading-tight">
                    {{ $home['how']['headline'] }}
                </h2>
            </div>
            <p class="text-subhead text-white/80 leading-relaxed self-end max-w-2xl">
                {{ $home['how']['sub'] }}
            </p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach($home['how']['phases'] as $phase)
                @include('partials.phase-card', ['phase' => $phase])
            @endforeach
        </div>
    </div>
</section>

{{-- ========== 5.8 STACK / PARTNERS ========== --}}
<section class="section">
    <div class="container-site">
        @include('partials.section-caption', ['caption' => $home['stack']['caption']])
        <h2 class="mt-4 text-display-m font-display font-bold leading-tight">{{ $home['stack']['headline'] }}</h2>

        <ul class="mt-10 grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-3">
            @foreach($home['stack']['partners'] as $p)
                <li class="flex items-center justify-between rounded-2xl border border-rule bg-surface px-5 py-4">
                    <span class="text-sm font-medium">{{ $p['name'] }}</span>
                    <span class="font-mono text-[11px] uppercase tracking-wider {{ $p['status'] === 'confirmed' ? 'text-lift' : 'text-mute' }}">
                        {{ $p['status'] }}
                    </span>
                </li>
            @endforeach
        </ul>
    </div>
</section>

{{-- ========== 5.9 FAQ ========== --}}
@include('partials.faq', ['items' => $faq])

{{-- ========== 5.10 FINAL CTA ========== --}}
@include('partials.cta-primary')

@endsection
