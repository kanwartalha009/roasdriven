@extends('layouts.app')

@section('title', 'Something broke — ROAS/Driven')

@section('content')
<section class="section">
    <div class="container-site min-h-[60vh] flex flex-col justify-center">
        <p class="font-mono text-caption uppercase tracking-wider text-pop">/ 500</p>
        <h1 class="mt-4 text-display-l font-display font-bold leading-tight max-w-[22ch]">
            Something broke on our side.
        </h1>
        <p class="mt-6 max-w-2xl text-subhead text-white/80">
            We've been pinged. Try again, or head back to the homepage.
        </p>
        <div class="mt-10 flex flex-wrap gap-4">
            <a href="{{ route('home') }}" class="btn-primary">Go home <span aria-hidden="true">↗</span></a>
        </div>
    </div>
</section>
@endsection
