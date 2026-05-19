@extends('layouts.app')

@section('title', $post['title'] . ' — ROAS/Driven Journal')
@section('description', $post['excerpt'])

@section('content')

<article class="section">
    <div class="container-site max-w-[760px]">
        <p class="font-mono text-caption uppercase tracking-wider text-lift">
            {{ $post['category'] }} · {{ $post['date'] }} · {{ $post['read'] }}
        </p>

        <h1 class="mt-6 text-display-l font-display font-bold leading-tight">{{ $post['title'] }}</h1>

        <p class="mt-6 text-mute font-mono text-sm">
            By {{ $post['author']['name'] }} · {{ $post['author']['role'] }}
        </p>

        <div class="mt-12 text-subhead text-white/85 leading-relaxed space-y-6">
            <p>{{ $post['excerpt'] }}</p>

            <p class="text-mute italic">
                [Full post body lives here in production. This is the launch stub; the real post will paste in over this layout.]
            </p>

            <h2 class="text-display-m font-display font-bold mt-12">Pull quote treatment.</h2>
            <blockquote class="my-8 border-l-4 border-lift pl-6 text-display-m font-display font-bold text-lift leading-tight">
                "Every Tuesday we ship a new test. Every Friday you get the live numbers."
            </blockquote>

            <p>
                [Body paragraphs continue. Inter 18px / 1.65. Headings General Sans Bold. Pull quotes in lift, sparingly used.]
            </p>
        </div>
    </div>
</article>

{{-- Author bio --}}
<section class="section pt-0">
    <div class="container-site max-w-[760px]">
        <div class="rounded-2xl border border-rule bg-surface p-6 flex items-center gap-4">
            <div aria-hidden="true" class="w-16 h-16 rounded-full bg-surface-2 flex items-center justify-center font-display font-black text-display-m text-mute/40">
                {{ strtoupper(substr($post['author']['name'], 1, 1)) }}
            </div>
            <div>
                <p class="font-display font-bold">{{ $post['author']['name'] }}</p>
                <p class="text-sm text-white/70">{{ $post['author']['role'] }}</p>
            </div>
        </div>
    </div>
</section>

{{-- Related --}}
@if(count($related))
<section class="section">
    <div class="container-site">
        @include('partials.section-caption', ['caption' => '/ RELATED'])
        <h2 class="mt-4 text-display-m font-display font-bold leading-tight mb-10">Keep reading.</h2>
        <div class="grid md:grid-cols-3 gap-4">
            @foreach($related as $r)
                <a href="{{ route('journal.show', $r['slug']) }}" class="block rounded-2xl border border-rule bg-surface p-6 card-hover">
                    <p class="font-mono text-caption uppercase tracking-wider text-lift">{{ $r['category'] }}</p>
                    <h3 class="mt-3 text-heading font-display font-bold leading-tight">{{ $r['title'] }}</h3>
                </a>
            @endforeach
        </div>
    </div>
</section>
@endif

@include('partials.cta-newsletter')
@include('partials.cta-primary')

@endsection
