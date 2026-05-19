<!DOCTYPE html>
<html lang="en" class="bg-ink">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#0A1430">
    <meta name="robots" content="noindex, nofollow">

    <title>@yield('title', 'Admin') · ROAS Driven</title>

    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-ink text-white antialiased min-h-screen flex flex-col">

@if(session('admin_authenticated'))
    <header class="border-b border-rule bg-surface/60 backdrop-blur sticky top-0 z-20">
        <div class="container-site flex items-center justify-between py-4">
            <div class="flex items-center gap-6">
                <a href="{{ route('admin.index') }}" class="flex items-center gap-3">
                    <img src="{{ asset('logo.svg') }}" alt="ROAS Driven" class="h-6 w-auto">
                    <span class="font-mono text-caption uppercase tracking-wider text-mute">admin</span>
                </a>
                <nav class="hidden md:flex items-center gap-6 text-sm">
                    <a href="{{ route('admin.index') }}"
                       class="{{ request()->routeIs('admin.index') ? 'text-lift' : 'text-white/70 hover:text-white' }} transition-colors">
                        Briefs
                    </a>
                </nav>
            </div>
            <div class="flex items-center gap-4">
                <span class="hidden sm:inline font-mono text-xs text-mute">{{ session('admin_email') }}</span>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="text-sm text-white/70 hover:text-lift transition-colors">
                        Sign out ↗
                    </button>
                </form>
            </div>
        </div>
    </header>
@endif

@if(session('admin.notice'))
    <div class="container-site mt-4">
        <p class="rounded-2xl border border-lift/40 bg-lift/10 px-4 py-2 text-sm text-lift font-mono">
            {{ session('admin.notice') }}
        </p>
    </div>
@endif

<main class="flex-1 py-10">
    @yield('content')
</main>

<footer class="border-t border-rule mt-12">
    <div class="container-site py-6 text-xs font-mono text-mute flex items-center justify-between">
        <span>© {{ date('Y') }} ROAS Driven — admin v1.0</span>
        <span>Press / to search</span>
    </div>
</footer>

</body>
</html>
