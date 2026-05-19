@extends('layouts.app')

@section('title', 'Not found — ROAS/Driven')

@section('content')
<section class="section">
    <div class="container-site min-h-[60vh] flex flex-col justify-center">
        <p class="font-mono text-caption uppercase tracking-wider text-lift">/ 404</p>
        <h1 class="mt-4 text-display-l font-display font-bold leading-tight max-w-[22ch]">
            This page is broken. Boring weeks are forbidden — broken pages aren't much better.
        </h1>
        <p class="mt-6 max-w-2xl text-subhead text-white/80">
            Try the homepage, the journal, or talk to us about your project.
        </p>
        <div class="mt-10 flex flex-wrap gap-4">
            <a href="{{ route('home') }}" class="btn-primary">Go home <span aria-hidden="true">↗</span></a>
            <a href="{{ route('journal.index') }}" class="btn-ghost">Read the journal <span aria-hidden="true">↗</span></a>
            <a href="{{ route('book') }}" class="btn-ghost">Book a strategy call <span aria-hidden="true">↗</span></a>
        </div>
    </div>
</section>
@endsection
