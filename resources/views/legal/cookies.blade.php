@extends('layouts.app')

@section('title', 'Cookies — ROAS/Driven')

@section('content')
<section class="section">
    <div class="container-site max-w-[760px]">
        @include('partials.section-caption', ['caption' => '/ LEGAL'])
        <h1 class="mt-6 text-display-m font-display font-bold">Cookie policy</h1>

        <div class="prose prose-invert mt-10 text-white/85 leading-relaxed space-y-6 max-w-none">
            <p class="text-mute italic">
                Placeholder. The launched site uses a non-blocking consent banner; analytics (GA4, PostHog) are loaded only after consent.
            </p>

            <h2 class="text-heading font-display font-bold">Strictly necessary</h2>
            <p>Session cookies required for the <code>/book</code> form and CSRF protection.</p>

            <h2 class="text-heading font-display font-bold">Analytics (opt-in)</h2>
            <p>GA4 and PostHog only after explicit consent. No third-party trackers load by default.</p>
        </div>
    </div>
</section>
@endsection
