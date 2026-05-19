@extends('layouts.app')

@section('title', 'Services — ROAS/Driven')
@section('description', 'Six disciplines, one P&L. Senior operators on every line item — paid media, CRO, lifecycle, Shopify, creative, SEO, AI.')

@section('content')

{{-- Hero --}}
<section class="relative overflow-hidden">
    <div aria-hidden="true" class="absolute inset-0 grid-bg opacity-60"></div>
    <div class="container-site relative pt-16 pb-16 md:pt-24 md:pb-24">
        @include('partials.section-caption', ['caption' => '/ SERVICES'])
        <h1 class="mt-6 text-display-l font-display font-bold leading-tight max-w-[22ch]">
            Six disciplines. One P&L. Senior operators on every line item.
        </h1>
        <p class="mt-8 max-w-3xl text-subhead text-white/80">
            Each service below is run by a senior operator with at least seven years inside DTC. No outsourced delivery, no junior account-management layer, no "account director who manages your account." Just the work.
        </p>
    </div>
</section>

{{-- Service grid --}}
<section class="section pt-0">
    <div class="container-site">
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($disciplines as $d)
                @include('partials.service-card', ['discipline' => $d])
            @endforeach
        </div>
    </div>
</section>

{{-- Three ways to start --}}
<section class="section bg-surface-2">
    <div class="container-site">
        <h2 class="text-display-m font-display font-bold mb-10">Three ways to start with us.</h2>

        <div class="grid md:grid-cols-3 gap-4">
            <div class="rounded-2xl border border-rule bg-surface p-8 card-hover">
                <p class="font-mono text-caption uppercase tracking-wider text-lift mb-4">/01 · TWO WEEKS</p>
                <h3 class="text-heading font-display font-bold">The Audit</h3>
                <p class="mt-4 text-white/70 leading-relaxed">A full audit of your ad accounts, Shopify store, lifecycle, and analytics. Written deliverable + 90-day plan. You leave with a plan whether or not you hire us.</p>
                <p class="mt-6 font-mono text-sm text-mute">Starts at $[X],XXX</p>
                <a href="{{ route('book') }}" class="mt-6 inline-flex items-center gap-2 text-sm text-lift">Book an audit <span aria-hidden="true">↗</span></a>
            </div>
            <div class="rounded-2xl border border-rule bg-surface p-8 card-hover">
                <p class="font-mono text-caption uppercase tracking-wider text-pop mb-4">/02 · 12 WEEKS</p>
                <h3 class="text-heading font-display font-bold">The Sprint</h3>
                <p class="mt-4 text-white/70 leading-relaxed">One discipline, hard outcome. "Lift mobile PDP CVR by 15%." "Get lifecycle to 30% of revenue." Defined deliverables, defined timeline, defined number.</p>
                <p class="mt-6 font-mono text-sm text-mute">Starts at $[X]K</p>
                <a href="{{ route('pricing') }}" class="mt-6 inline-flex items-center gap-2 text-sm text-pop">See sprint scopes <span aria-hidden="true">↗</span></a>
            </div>
            <div class="rounded-2xl border border-rule bg-surface p-8 card-hover">
                <p class="font-mono text-caption uppercase tracking-wider text-heat mb-4">/03 · RETAINER</p>
                <h3 class="text-heading font-display font-bold">The Partnership</h3>
                <p class="mt-4 text-white/70 leading-relaxed">Full-stack growth team. Paid + CRO + lifecycle + dev under one roof. Weekly cadence, monthly P&L, quarterly roadmap. Two retainer tiers.</p>
                <p class="mt-6 font-mono text-sm text-mute">Starts at $[X]K/month</p>
                <a href="{{ route('pricing') }}" class="mt-6 inline-flex items-center gap-2 text-sm text-heat">See pricing <span aria-hidden="true">↗</span></a>
            </div>
        </div>
    </div>
</section>

@include('partials.cta-primary')

@endsection
