@extends('layouts.app')

@section('title', 'Book a strategy call — ROAS/Driven')
@section('description', 'Tell us about your brand. 30-minute call with a senior operator — not a sales rep.')

@section('content')

<section class="relative overflow-hidden">
    <div aria-hidden="true" class="absolute inset-0 grid-bg opacity-60"></div>
    <div class="container-site relative pt-16 pb-16 md:pt-24 md:pb-24">
        @include('partials.section-caption', ['caption' => '/ STRATEGY CALL · 30 MINUTES'])
        <h1 class="mt-6 text-display-l font-display font-bold leading-tight max-w-[22ch]">
            Let's talk numbers.
        </h1>
        <p class="mt-8 max-w-3xl text-subhead text-white/80">
            Tell us about your brand. If we're a fit, we'll send you a 30-minute call slot within 24 hours. If we're not, we'll tell you in the reply — and point you to someone who is.
        </p>
    </div>
</section>

@if(session('book.submitted'))
    {{-- Confirmation state --}}
    <section class="section pt-0">
        <div class="container-site">
            <div class="rounded-2xl border border-lift bg-surface p-10 md:p-16 max-w-3xl">
                <p class="font-mono text-caption uppercase tracking-wider text-lift">/ BRIEF RECEIVED</p>
                <h2 class="mt-4 text-display-m font-display font-bold leading-tight">
                    Brief received. Check your inbox in one business day.
                </h2>
                <p class="mt-6 text-white/80">
                    Senior operator on the call — not a sales rep. If we're not a fit we'll tell you in the reply. Either way you get an answer.
                </p>
                <a href="{{ route('journal.index') }}" class="btn-ghost mt-8">
                    While you wait, read the journal <span aria-hidden="true">↗</span>
                </a>
            </div>
        </div>
    </section>
@else
    <section class="section pt-0">
        <div class="container-site grid lg:grid-cols-[3fr_2fr] gap-12">

            {{-- Form (left) --}}
            <form method="POST" action="{{ route('book.store') }}" class="space-y-6">
                @csrf

                @if($errors->any())
                    <div role="alert" aria-live="polite" class="rounded-2xl border border-pop bg-surface p-4 text-sm text-pop">
                        Please check the fields below.
                    </div>
                @endif

                <div class="grid sm:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="label">Full name *</label>
                        <input id="name" name="name" type="text" required value="{{ old('name') }}" class="input" autocomplete="name">
                        @error('name')<p class="mt-1 text-sm text-pop">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="email" class="label">Work email *</label>
                        <input id="email" name="email" type="email" required value="{{ old('email') }}" class="input" autocomplete="email">
                        @error('email')<p class="mt-1 text-sm text-pop">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div class="grid sm:grid-cols-2 gap-6">
                    <div>
                        <label for="brand" class="label">Brand name *</label>
                        <input id="brand" name="brand" type="text" required value="{{ old('brand') }}" class="input">
                        @error('brand')<p class="mt-1 text-sm text-pop">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="url" class="label">Brand URL *</label>
                        <input id="url" name="url" type="text" required placeholder="https://" value="{{ old('url') }}" class="input">
                        @error('url')<p class="mt-1 text-sm text-pop">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div class="grid sm:grid-cols-2 gap-6">
                    <div>
                        <label for="revenue" class="label">Monthly online revenue</label>
                        <select id="revenue" name="revenue" class="input">
                            <option value="">Pick a range…</option>
                            @foreach(['<$50K', '$50K–$250K', '$250K–$1M', '$1M–$5M', '$5M–$20M', '$20M+'] as $r)
                                <option value="{{ $r }}" @selected(old('revenue') === $r)>{{ $r }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="spend" class="label">Current paid spend / month</label>
                        <select id="spend" name="spend" class="input">
                            <option value="">Pick a range…</option>
                            @foreach(['<$50K', '$50K–$250K', '$250K–$1M', '$1M–$5M', '$5M–$20M', '$20M+'] as $r)
                                <option value="{{ $r }}" @selected(old('spend') === $r)>{{ $r }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div>
                    <span class="label">What you need <span class="text-mute font-normal">(multi-select)</span></span>
                    <div class="flex flex-wrap gap-2">
                        @foreach(['Paid', 'CRO', 'Lifecycle', 'Shopify dev', 'Creative', 'SEO', 'AI', 'Not sure'] as $need)
                            <label class="cursor-pointer">
                                <input type="checkbox" name="needs[]" value="{{ $need }}" class="peer sr-only" @checked(in_array($need, (array) old('needs', [])))>
                                <span class="inline-flex items-center rounded-full border border-rule px-4 py-2 text-sm transition-colors peer-checked:bg-lift peer-checked:text-ink peer-checked:border-lift">
                                    {{ $need }}
                                </span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <div>
                    <label for="message" class="label">Anything else <span class="text-mute font-normal">(optional)</span></label>
                    <textarea id="message" name="message" rows="4" class="input" maxlength="2000">{{ old('message') }}</textarea>
                </div>

                <div class="pt-4">
                    <button type="submit" class="btn-primary">Send my brief <span aria-hidden="true">↗</span></button>
                    <p class="mt-4 font-mono text-xs text-mute">
                        No spam, no newsletter signup, no sales follow-up if we're not a fit.
                    </p>
                </div>
            </form>

            {{-- Right column: testimonial + metrics --}}
            <aside class="space-y-6">
                <div class="rounded-2xl border border-rule bg-surface p-6">
                    <p class="eyebrow mb-4"><span class="slash">/</span> WHAT HAPPENS NEXT</p>
                    <ol class="space-y-3 text-sm text-white/85">
                        <li class="flex gap-3"><span class="text-lift font-mono">1</span> You submit the form.</li>
                        <li class="flex gap-3"><span class="text-lift font-mono">2</span> We reply within one business day.</li>
                        <li class="flex gap-3"><span class="text-lift font-mono">3</span> If we're a fit, you get a 30-minute call slot — senior operator on the call, not a sales rep.</li>
                    </ol>
                </div>

                @foreach(array_slice(config('content.home.metrics'), 0, 2) as $metric)
                    @include('partials.metric-card', ['metric' => $metric])
                @endforeach
            </aside>
        </div>
    </section>
@endif

@endsection
