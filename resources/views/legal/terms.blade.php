@extends('layouts.app')

@section('title', 'Terms — ROAS/Driven')

@section('content')
<section class="section">
    <div class="container-site max-w-[760px]">
        @include('partials.section-caption', ['caption' => '/ LEGAL'])
        <h1 class="mt-6 text-display-m font-display font-bold">Terms of service</h1>

        <div class="prose prose-invert mt-10 text-white/85 leading-relaxed space-y-6 max-w-none">
            <p class="text-mute italic">
                Placeholder content. Replace with lawyer-reviewed terms before launch. Tone: plain English, no "notwithstanding the foregoing".
            </p>

            <h2 class="text-heading font-display font-bold">Engagement</h2>
            <p>All engagements are governed by a signed statement of work. The website is informational; the contract is the source of truth.</p>

            <h2 class="text-heading font-display font-bold">Acceptable use</h2>
            <p>Don't scrape, attack, or otherwise abuse this site.</p>

            <h2 class="text-heading font-display font-bold">Liability</h2>
            <p>The site is provided "as is." We disclaim warranties to the extent permitted by applicable law.</p>
        </div>
    </div>
</section>
@endsection
