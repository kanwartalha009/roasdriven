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

@include('partials.cta-primary')

@endsection
