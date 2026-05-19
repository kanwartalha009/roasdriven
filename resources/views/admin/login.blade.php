@extends('admin.layout')

@section('title', 'Sign in')

@section('content')
<section class="relative min-h-[78vh] flex items-center justify-center px-6 overflow-hidden">

    {{-- Soft blue glow behind the card --}}
    <div aria-hidden="true" class="absolute inset-0 glow-bg pointer-events-none"></div>
    <div aria-hidden="true" class="absolute inset-0 grid-bg opacity-30 pointer-events-none"></div>

    <div class="relative w-full max-w-[360px]">

        {{-- Logo + eyebrow --}}
        <div class="text-center mb-8">
            <img src="{{ asset('logo.svg') }}" alt="ROAS Driven" class="h-8 w-auto mx-auto">
            <p class="mt-5 inline-flex items-center gap-2 font-mono text-[11px] uppercase tracking-[0.18em] text-mute">
                <span class="inline-block w-1.5 h-1.5 rounded-full bg-lift"></span>
                Admin · sign in
            </p>
        </div>

        {{-- Card --}}
        <form method="POST" action="{{ route('admin.login.submit') }}"
              class="rounded-2xl border border-rule bg-surface/90 backdrop-blur-sm shadow-xl shadow-lift/5 p-7 space-y-5">
            @csrf

            @if($errors->any())
                <div role="alert"
                     class="rounded-xl border border-pop/40 bg-pop/10 px-3 py-2 text-xs text-pop font-mono">
                    {{ $errors->first() }}
                </div>
            @endif

            <div>
                <label for="email" class="label text-xs uppercase tracking-wider font-mono text-mute">Email</label>
                <input id="email"
                       name="email"
                       type="email"
                       required
                       autofocus
                       autocomplete="username"
                       value="{{ old('email') }}"
                       class="input mt-1.5">
            </div>

            <div>
                <label for="password" class="label text-xs uppercase tracking-wider font-mono text-mute">Password</label>
                <input id="password"
                       name="password"
                       type="password"
                       required
                       autocomplete="current-password"
                       class="input mt-1.5">
            </div>

            <button type="submit" class="btn-primary w-full justify-center mt-1">
                Sign in <span aria-hidden="true">↗</span>
            </button>
        </form>

        <p class="mt-6 text-center font-mono text-[10px] uppercase tracking-[0.18em] text-mute">
            Authorized personnel · rate-limited
        </p>
    </div>
</section>
@endsection
