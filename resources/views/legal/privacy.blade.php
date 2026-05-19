@extends('layouts.app')

@section('title', 'Privacy — ROAS/Driven')

@section('content')
<section class="section">
    <div class="container-site max-w-[760px]">
        @include('partials.section-caption', ['caption' => '/ LEGAL'])
        <h1 class="mt-6 text-display-m font-display font-bold">Privacy policy</h1>

        <div class="prose prose-invert mt-10 text-white/85 leading-relaxed space-y-6 max-w-none">
            <p class="text-mute italic">
                Placeholder content. The launched site uses a lawyer-reviewed template (Iubenda or similar) that addresses GDPR (EU) and PDPL (UAE) since ROAS/Driven serves both markets.
            </p>

            <h2 class="text-heading font-display font-bold">What we collect</h2>
            <p>Form submissions on <code>/book</code>: name, work email, brand name, brand URL, revenue + spend ranges (optional), needs (optional), free-text notes (optional). No tracking cookies are loaded before consent.</p>

            <h2 class="text-heading font-display font-bold">How we use it</h2>
            <p>Only to reply to your strategy-call brief. We don't sell or share data with third parties for marketing.</p>

            <h2 class="text-heading font-display font-bold">Your rights</h2>
            <p>Under GDPR and PDPL you can request access, correction, or deletion of your data. Email <a href="mailto:hello@roasdriven.io" class="text-lift">hello@roasdriven.io</a>.</p>

            <h2 class="text-heading font-display font-bold">Contact</h2>
            <p>ROAS/Driven · Dubai, UAE · <a href="mailto:hello@roasdriven.io" class="text-lift">hello@roasdriven.io</a></p>
        </div>
    </div>
</section>
@endsection
