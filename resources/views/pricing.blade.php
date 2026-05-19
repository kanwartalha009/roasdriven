@extends('layouts.app')

@section('title', 'Pricing — ROAS/Driven')
@section('description', 'Three ways to start. No "request a quote." Audit, sprint, or partnership — published, transparent, no haggling.')

@section('content')

{{-- Hero --}}
<section class="relative overflow-hidden">
    <div aria-hidden="true" class="absolute inset-0 grid-bg opacity-60"></div>
    <div class="container-site relative pt-16 pb-16 md:pt-24 md:pb-24">
        @include('partials.section-caption', ['caption' => '/ PRICING'])
        <h1 class="mt-6 text-display-l font-display font-bold leading-tight max-w-[22ch]">
            Three ways to start. No "request a quote."
        </h1>
        <p class="mt-8 max-w-3xl text-subhead text-white/80">
            We publish our pricing because senior teams don't hide it. Below is what an engagement actually costs — audits, sprints, partnerships.
        </p>
    </div>
</section>

{{-- Tiers --}}
<section class="section pt-0">
    <div class="container-site">
        <div class="grid md:grid-cols-3 gap-4">
            @foreach($tiers as $tier)
                @php $hl = $tier['highlighted']; @endphp
                <article class="rounded-2xl border p-8 flex flex-col h-full transition-transform duration-site ease-site hover:-translate-y-2 {{ $hl ? 'border-lift bg-surface relative shadow-[0_0_0_1px_var(--lift)]' : 'border-rule bg-surface' }}">
                    @if($hl)
                        <span class="absolute -top-3 left-6 rounded-full bg-lift px-3 py-1 text-xs font-mono uppercase tracking-wider text-ink">Most popular</span>
                    @endif

                    <p class="font-mono text-caption uppercase tracking-wider text-mute">{{ $tier['tier'] }}</p>
                    <h2 class="mt-2 text-heading font-display font-bold">{{ $tier['name'] }}</h2>

                    <p class="mt-6 text-display-m font-display font-black {{ $hl ? 'text-lift' : 'text-white' }} leading-none">
                        {{ $tier['price'] }}
                    </p>
                    <p class="mt-2 font-mono text-xs text-mute uppercase tracking-wider">{{ $tier['cadence'] }}</p>

                    <dl class="mt-8 space-y-4 text-sm text-white/85 flex-1">
                        <div>
                            <dt class="font-mono text-xs uppercase tracking-wider text-mute">Scope</dt>
                            <dd class="mt-1">{{ $tier['scope'] }}</dd>
                        </div>
                        <div>
                            <dt class="font-mono text-xs uppercase tracking-wider text-mute">Deliverable</dt>
                            <dd class="mt-1">{{ $tier['deliverable'] }}</dd>
                        </div>
                        <div>
                            <dt class="font-mono text-xs uppercase tracking-wider text-mute">You leave with</dt>
                            <dd class="mt-1">{{ $tier['leave_with'] }}</dd>
                        </div>
                    </dl>

                    <a href="{{ route('book') }}"
                       class="{{ $hl ? 'btn-primary' : 'btn-ghost' }} mt-8 w-full justify-center">
                        {{ $tier['cta'] }} <span aria-hidden="true">↗</span>
                    </a>
                </article>
            @endforeach
        </div>
    </div>
</section>

{{-- Not included --}}
<section class="section bg-surface-2">
    <div class="container-site grid lg:grid-cols-[1fr_2fr] gap-12">
        <div>
            @include('partials.section-caption', ['caption' => '/ NOT INCLUDED'])
            <h2 class="mt-4 text-display-m font-display font-bold leading-tight">What's not included (by design).</h2>
        </div>
        <ul class="space-y-3">
            @foreach($excluded as $item)
                <li class="flex items-start gap-3 border-b border-rule pb-3">
                    <span class="text-mute mt-1" aria-hidden="true">/</span>
                    <span class="text-white/85">{{ $item }}</span>
                </li>
            @endforeach
        </ul>
    </div>
</section>

@include('partials.faq', ['items' => $faq, 'headline' => 'Pricing FAQ.'])

@include('partials.cta-primary')

@endsection
