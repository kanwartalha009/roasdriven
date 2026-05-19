@extends('layouts.app')

@section('title', $case['name'] . ' case study — ROAS/Driven')
@section('description', $case['subhead'])

@section('content')

{{-- Hero --}}
<section class="relative overflow-hidden">
    <div aria-hidden="true" class="absolute inset-0 grid-bg opacity-60"></div>
    <div class="container-site relative pt-16 pb-16 md:pt-24 md:pb-24">
        @include('partials.section-caption', [
            'caption' => '/ CASE STUDY · ' . strtoupper($case['industry']) . ' · ' . strtoupper($case['market']),
        ])

        <h1 class="mt-6 text-display-xl font-display font-black leading-[0.92] tracking-tight">
            {{ $case['name'] }}
        </h1>
        <p class="mt-8 max-w-3xl text-subhead text-white/80">
            {{ $case['subhead'] }}
        </p>
    </div>
</section>

{{-- Metric strip --}}
<section class="section pt-0">
    <div class="container-site">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach($case['metrics'] as $metric)
                @include('partials.metric-card', ['metric' => $metric])
            @endforeach
        </div>
    </div>
</section>

{{-- Problem --}}
<section class="section bg-surface-2">
    <div class="container-site grid lg:grid-cols-[1fr_2fr] gap-12">
        <div>
            @include('partials.section-caption', ['caption' => '/ PROBLEM'])
            <h2 class="mt-4 text-display-m font-display font-bold">What was broken.</h2>
        </div>
        <p class="text-subhead text-white/80 leading-relaxed max-w-3xl">{{ $case['problem'] }}</p>
    </div>
</section>

{{-- Approach --}}
<section class="section">
    <div class="container-site grid lg:grid-cols-[1fr_2fr] gap-12">
        <div>
            @include('partials.section-caption', ['caption' => '/ APPROACH'])
            <h2 class="mt-4 text-display-m font-display font-bold">What we did.</h2>
        </div>
        <ul class="space-y-3">
            @foreach($case['approach'] as $a)
                <li class="flex items-start gap-3 border-b border-rule pb-3">
                    <span class="text-lift mt-1" aria-hidden="true">/</span>
                    <span class="text-white/85">{{ $a }}</span>
                </li>
            @endforeach
        </ul>
    </div>
</section>

{{-- Result --}}
<section class="section bg-surface-2">
    <div class="container-site grid lg:grid-cols-[1fr_2fr] gap-12">
        <div>
            @include('partials.section-caption', ['caption' => '/ RESULT'])
            <h2 class="mt-4 text-display-m font-display font-bold">What changed.</h2>
        </div>
        <p class="text-subhead text-white/80 leading-relaxed max-w-3xl">{{ $case['result'] }}</p>
    </div>
</section>

{{-- Stack --}}
<section class="section">
    <div class="container-site">
        @include('partials.section-caption', ['caption' => '/ STACK'])
        <ul class="mt-6 flex flex-wrap gap-3">
            @foreach($case['stack'] as $tool)
                <li class="rounded-full border border-rule px-4 py-2 text-sm">{{ $tool }}</li>
            @endforeach
        </ul>
    </div>
</section>

{{-- Next case --}}
@if($next)
    <section class="section">
        <div class="container-site">
            <p class="eyebrow mb-4"><span class="slash">/</span> NEXT CASE STUDY</p>
            @include('partials.case-card', ['case' => $next])
        </div>
    </section>
@endif

@include('partials.cta-primary')

@endsection
