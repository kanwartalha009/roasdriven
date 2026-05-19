@extends('layouts.app')

@section('title', 'Journal — ROAS/Driven')
@section('description', 'Short, opinionated, numbers-forward writing on paid media, CRO, lifecycle, and Shopify engineering.')

@section('content')

{{-- Hero --}}
<section class="relative overflow-hidden">
    <div aria-hidden="true" class="absolute inset-0 grid-bg opacity-60"></div>
    <div class="container-site relative pt-16 pb-16 md:pt-24 md:pb-24">
        @include('partials.section-caption', ['caption' => '/ JOURNAL'])
        <h1 class="mt-6 text-display-l font-display font-bold leading-tight max-w-[22ch]">
            What we're seeing in DTC.
        </h1>
        <p class="mt-8 max-w-3xl text-subhead text-white/80">
            Short, opinionated, numbers-forward writing on paid media, CRO, lifecycle, and Shopify engineering. Pulled from real client work. Published every two weeks.
        </p>
    </div>
</section>

{{-- Featured + grid --}}
<section class="section pt-0">
    <div class="container-site">
        @php($featured = $posts[0] ?? null)
        @if($featured)
            <a href="{{ route('journal.show', $featured['slug']) }}"
               class="block rounded-2xl border border-rule bg-surface p-10 md:p-12 card-hover mb-8">
                <p class="font-mono text-caption uppercase tracking-wider text-lift">{{ $featured['category'] }} · FEATURED</p>
                <h2 class="mt-4 text-display-m font-display font-bold leading-tight max-w-3xl">{{ $featured['title'] }}</h2>
                <p class="mt-4 text-white/70 max-w-3xl">{{ $featured['excerpt'] }}</p>
                <p class="mt-6 font-mono text-xs text-mute">{{ $featured['date'] }} · {{ $featured['read'] }}</p>
            </a>
        @endif

        <div class="grid md:grid-cols-3 gap-4">
            @foreach(array_slice($posts, 1) as $post)
                <a href="{{ route('journal.show', $post['slug']) }}"
                   class="block rounded-2xl border border-rule bg-surface p-6 card-hover h-full">
                    <p class="font-mono text-caption uppercase tracking-wider text-lift">{{ $post['category'] }}</p>
                    <h3 class="mt-3 text-heading font-display font-bold leading-tight">{{ $post['title'] }}</h3>
                    <p class="mt-3 text-white/70 text-sm">{{ $post['excerpt'] }}</p>
                    <p class="mt-6 font-mono text-xs text-mute">{{ $post['date'] }} · {{ $post['read'] }}</p>
                </a>
            @endforeach
        </div>
    </div>
</section>

@include('partials.cta-newsletter')

@endsection
