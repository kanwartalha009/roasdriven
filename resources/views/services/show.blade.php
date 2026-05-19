@extends('layouts.app')

@section('title', $service['headline'] . ' — ROAS/Driven')
@section('description', $service['sub'])

@section('content')

{{-- Hero --}}
<section class="relative overflow-hidden">
    <div aria-hidden="true" class="absolute inset-0 grid-bg opacity-60"></div>
    <div class="container-site relative pt-16 pb-16 md:pt-24 md:pb-24">
        @include('partials.section-caption', ['caption' => $service['eyebrow']])

        <h1 class="mt-6 text-display-l font-display font-bold leading-tight max-w-[22ch]">
            {{ $service['headline'] }}
        </h1>
        <p class="mt-8 max-w-3xl text-subhead text-white/80">
            {{ $service['sub'] }}
        </p>

        <div class="mt-10 flex flex-wrap gap-4">
            <a href="{{ route('book') }}" class="btn-primary">
                {{ $service['cta_primary'] }} <span aria-hidden="true">↗</span>
            </a>
            <a href="{{ route('work.index') }}" class="btn-ghost">See case studies <span aria-hidden="true">↗</span></a>
        </div>
    </div>
</section>

{{-- What we do --}}
<section class="section">
    <div class="container-site grid lg:grid-cols-[1fr_2fr] gap-12">
        <div>
            @include('partials.section-caption', ['caption' => '/ WHAT WE DO'])
            <h2 class="mt-4 text-display-m font-display font-bold leading-tight">{{ $service['lede_title'] }}</h2>
        </div>
        <p class="text-white/80 text-subhead leading-relaxed">{{ $service['lede'] }}</p>
    </div>
</section>

{{-- How we do it --}}
<section class="section bg-surface-2">
    <div class="container-site">
        <h2 class="text-display-m font-display font-bold mb-12">How we do it.</h2>
        <div class="grid md:grid-cols-2 gap-4">
            @foreach($service['how'] as $i => $step)
                <div class="rounded-2xl border border-rule bg-surface p-8 card-hover">
                    <p class="font-display font-black text-[64px] leading-none text-lift">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</p>
                    <h3 class="mt-6 text-heading font-display font-bold">{{ $step['title'] }}</h3>
                    <p class="mt-3 text-white/70 leading-relaxed">{{ $step['body'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Scope inclusions --}}
<section class="section">
    <div class="container-site grid lg:grid-cols-2 gap-12">
        <div>
            @include('partials.section-caption', ['caption' => '/ SCOPE'])
            <h2 class="mt-4 text-display-m font-display font-bold leading-tight">What's in a typical engagement.</h2>
        </div>
        <ul class="space-y-3">
            @foreach($service['scope'] as $item)
                <li class="flex items-start gap-3 border-b border-rule pb-3">
                    <span class="text-lift mt-1" aria-hidden="true">/</span>
                    <span class="text-white/85">{{ $item }}</span>
                </li>
            @endforeach
        </ul>
    </div>
</section>

{{-- What good looks like --}}
<section class="section bg-surface-2">
    <div class="container-site">
        @include('partials.section-caption', ['caption' => '/ WHAT GOOD LOOKS LIKE'])
        <h2 class="mt-4 text-display-m font-display font-bold leading-tight max-w-3xl">Results we target.</h2>

        <div class="mt-12 grid sm:grid-cols-2 lg:grid-cols-{{ min(count($service['good']), 4) }} gap-4">
            @foreach($service['good'] as $i => $g)
                @php
                    $tones = ['lift', 'pop', 'heat', 'lift'];
                    $tone = $tones[$i % 4];
                @endphp
                @include('partials.metric-card', ['metric' => [
                    'caption' => 'TARGET ' . ($i + 1),
                    'value'   => $g,
                    'tone'    => $tone,
                ]])
            @endforeach
        </div>
    </div>
</section>

{{-- FAQ --}}
@include('partials.faq', ['items' => $service['faq'], 'headline' => 'Frequently asked.'])

@include('partials.cta-primary')

@endsection
