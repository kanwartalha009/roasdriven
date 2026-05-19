@extends('layouts.app')

@section('title', 'About — ROAS/Driven')
@section('description', 'A real team. Senior operators. No theatre.')

@section('content')

{{-- Hero --}}
<section class="relative overflow-hidden">
    <div aria-hidden="true" class="absolute inset-0 grid-bg opacity-60"></div>
    <div class="container-site relative pt-16 pb-16 md:pt-24 md:pb-24">
        @include('partials.section-caption', ['caption' => $about['hero']['eyebrow']])
        <h1 class="mt-6 text-display-l font-display font-bold leading-tight max-w-[22ch]">
            {{ $about['hero']['headline'] }}
        </h1>
        <p class="mt-8 max-w-3xl text-subhead text-white/80">
            {{ $about['hero']['sub'] }}
        </p>
    </div>
</section>

{{-- Manifesto --}}
<section class="section bg-surface-2">
    <div class="container-site">
        @include('partials.section-caption', ['caption' => '/ MANIFESTO'])
        <h2 class="mt-4 text-display-m font-display font-bold leading-tight mb-12">Five rules we work by.</h2>

        <ol class="grid md:grid-cols-2 gap-4">
            @foreach($about['manifesto'] as $i => $rule)
                @php
                    $tones = ['lift', 'pop', 'heat', 'lift', 'pop'];
                    $tone = $tones[$i % 5];
                    $color = match($tone) {
                        'pop' => 'text-pop',
                        'heat' => 'text-heat',
                        default => 'text-lift',
                    };
                @endphp
                <li class="rounded-2xl border border-rule bg-surface p-8 card-hover">
                    <p class="font-display font-black text-[64px] leading-none {{ $color }}">
                        {{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}
                    </p>
                    <h3 class="mt-6 text-heading font-display font-bold">{{ $rule['title'] }}</h3>
                    <p class="mt-3 text-white/70 leading-relaxed">{{ $rule['body'] }}</p>
                </li>
            @endforeach
        </ol>
    </div>
</section>

{{-- Team --}}
<section class="section">
    <div class="container-site">
        @include('partials.section-caption', ['caption' => '/ TEAM'])
        <h2 class="mt-4 text-display-m font-display font-bold leading-tight mb-12">Who's on the work.</h2>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($about['team'] as $i => $member)
                <div class="rounded-2xl border border-rule bg-surface p-6 card-hover">
                    {{-- Placeholder photo block --}}
                    <div aria-hidden="true" class="aspect-square rounded-xl bg-surface-2 mb-4 flex items-center justify-center">
                        <span class="font-display font-black text-display-m text-mute/40">
                            {{ strtoupper(substr($member['name'], 1, 1)) }}
                        </span>
                    </div>
                    <h3 class="text-heading font-display font-bold">{{ $member['name'] }}</h3>
                    <p class="mt-1 text-sm text-white/70">{{ $member['role'] }}</p>
                    <p class="mt-2 font-mono text-xs text-mute">{{ $member['years'] }} years in DTC</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- What we don't do --}}
<section class="section bg-surface-2">
    <div class="container-site grid lg:grid-cols-[1fr_2fr] gap-12">
        <div>
            @include('partials.section-caption', ['caption' => '/ NOT FOR'])
            <h2 class="mt-4 text-display-m font-display font-bold leading-tight">What we don't do.</h2>
        </div>
        <ul class="space-y-3">
            @foreach($about['not_for'] as $item)
                <li class="flex items-start gap-3 border-b border-rule pb-3">
                    <span class="text-pop mt-1" aria-hidden="true">/</span>
                    <span class="text-white/85">{{ $item }}</span>
                </li>
            @endforeach
        </ul>
    </div>
</section>

@include('partials.cta-primary')

@endsection
