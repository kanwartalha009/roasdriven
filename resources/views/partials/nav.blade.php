@php($navItems = config('content.nav'))
@php($spots = config('content.brand.spots'))

<header
    data-nav
    class="fixed inset-x-0 top-0 z-50 transition-all duration-site ease-site [&.is-scrolled]:bg-ink/95 [&.is-scrolled]:backdrop-blur [&.is-scrolled]:border-b [&.is-scrolled]:border-rule"
>
    <div class="container-site flex items-center justify-between py-4">
        {{-- Logo --}}
        <a href="{{ route('home') }}"
           class="inline-flex items-center"
           aria-label="ROAS/Driven home">
            <img src="{{ asset('logo.svg') }}"
                 alt="ROAS/Driven"
                 width="160"
                 height="42"
                 class="h-7 md:h-8 w-auto select-none"
                 draggable="false">
        </a>

        {{-- Desktop nav --}}
        <nav class="hidden lg:flex items-center gap-8" aria-label="Primary">
            @foreach($navItems as $item)
                <a href="{{ route($item['route']) }}"
                   class="text-sm text-white/80 hover:text-white transition-colors duration-site ease-site">
                    {{ $item['label'] }}
                </a>
            @endforeach
        </nav>

        {{-- Right --}}
        <div class="flex items-center gap-4">
            <span class="hidden md:inline-flex items-center gap-2 text-xs font-mono text-mute">
                {{ $spots }}
            </span>
            <a href="{{ route('book') }}" class="hidden md:inline-flex btn-primary">
                Book strategy call <span aria-hidden="true">↗</span>
            </a>

            {{-- Mobile toggle --}}
            <button
                type="button"
                data-mobile-toggle
                aria-expanded="false"
                aria-controls="mobile-overlay"
                class="lg:hidden inline-flex items-center justify-center w-10 h-10 rounded-full border border-rule text-white"
            >
                <span class="sr-only">Open menu</span>
                <svg class="w-5 h-5" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.6">
                    <path d="M3 5h14M3 10h14M3 15h14" stroke-linecap="round"/>
                </svg>
            </button>
        </div>
    </div>
</header>

{{-- Mobile overlay --}}
<div
    id="mobile-overlay"
    data-mobile-overlay
    class="fixed inset-0 z-40 bg-ink/98 backdrop-blur-md hidden [&.is-open]:flex flex-col items-start justify-center px-6 pt-24 lg:hidden"
>
    <nav class="flex flex-col gap-6 w-full" aria-label="Mobile">
        @foreach($navItems as $item)
            <a href="{{ route($item['route']) }}"
               class="text-display-m font-display font-bold">
                {{ $item['label'] }}
            </a>
        @endforeach
        <a href="{{ route('book') }}" class="btn-primary mt-6 w-fit">
            Book strategy call <span aria-hidden="true">↗</span>
        </a>
        <p class="mt-6 text-xs font-mono text-mute">{{ $spots }}</p>
    </nav>
</div>

{{-- Spacer for fixed nav --}}
<div aria-hidden="true" class="h-20"></div>
