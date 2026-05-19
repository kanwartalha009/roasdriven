@extends('admin.layout')

@section('title', 'Brief #' . $brief->id)

@section('content')
<section class="container-site max-w-[860px]">

    <a href="{{ route('admin.index') }}" class="inline-flex items-center gap-2 text-sm text-mute hover:text-lift mb-8">
        <span aria-hidden="true">←</span> Back to all briefs
    </a>

    <header class="mb-8 pb-6 border-b border-rule">
        <p class="font-mono text-caption uppercase tracking-wider text-lift">
            / BRIEF #{{ $brief->id }} · {{ $brief->created_at->format('M j, Y · H:i') }}
        </p>
        <h1 class="mt-3 text-display-m font-display font-bold leading-tight">
            {{ $brief->brand }}
        </h1>
        @if($brief->url)
            <a href="{{ Str::startsWith($brief->url, ['http://','https://']) ? $brief->url : 'https://'.$brief->url }}"
               target="_blank" rel="noopener noreferrer"
               class="inline-flex items-center gap-1 mt-2 text-sm text-mute hover:text-lift">
                {{ preg_replace('#^https?://#', '', $brief->url) }} ↗
            </a>
        @endif
    </header>

    <div class="grid sm:grid-cols-2 gap-6 mb-10">
        <div class="rounded-2xl border border-rule bg-surface p-6">
            <p class="font-mono text-caption uppercase tracking-wider text-mute">Contact</p>
            <p class="mt-3 text-heading font-display font-bold">{{ $brief->name }}</p>
            <a href="mailto:{{ $brief->email }}" class="block text-sm text-lift mt-1">{{ $brief->email }}</a>
        </div>

        <div class="rounded-2xl border border-rule bg-surface p-6">
            <p class="font-mono text-caption uppercase tracking-wider text-mute">Financials</p>
            <dl class="mt-3 grid grid-cols-2 gap-4 text-sm">
                <div>
                    <dt class="font-mono text-xs text-mute">Revenue / month</dt>
                    <dd class="mt-1 text-white">{{ $brief->revenue ?: '—' }}</dd>
                </div>
                <div>
                    <dt class="font-mono text-xs text-mute">Paid spend / month</dt>
                    <dd class="mt-1 text-white">{{ $brief->spend ?: '—' }}</dd>
                </div>
            </dl>
        </div>
    </div>

    <div class="rounded-2xl border border-rule bg-surface p-6 mb-6">
        <p class="font-mono text-caption uppercase tracking-wider text-mute mb-3">What they need</p>
        @if(!empty($brief->needs))
            <div class="flex flex-wrap gap-2">
                @foreach($brief->needs as $need)
                    <span class="rounded-full bg-surface-2 border border-rule px-3 py-1 text-xs font-mono uppercase tracking-wider text-white/85">
                        {{ $need }}
                    </span>
                @endforeach
            </div>
        @else
            <p class="text-mute text-sm">Not specified.</p>
        @endif
    </div>

    <div class="rounded-2xl border border-rule bg-surface p-6 mb-10">
        <p class="font-mono text-caption uppercase tracking-wider text-mute mb-3">Message</p>
        @if($brief->message)
            <p class="text-white/90 leading-relaxed whitespace-pre-line">{{ $brief->message }}</p>
        @else
            <p class="text-mute text-sm">No message left.</p>
        @endif
    </div>

    <details class="rounded-2xl border border-rule bg-surface-2/50 p-4 text-sm">
        <summary class="cursor-pointer font-mono text-caption uppercase tracking-wider text-mute">
            Submission metadata
        </summary>
        <dl class="mt-4 grid sm:grid-cols-2 gap-3">
            <div>
                <dt class="font-mono text-xs text-mute">IP address</dt>
                <dd class="text-white font-mono">{{ $brief->ip_address ?: '—' }}</dd>
            </div>
            <div>
                <dt class="font-mono text-xs text-mute">User agent</dt>
                <dd class="text-white/80 text-xs break-all">{{ $brief->user_agent ?: '—' }}</dd>
            </div>
            <div>
                <dt class="font-mono text-xs text-mute">Brief ID</dt>
                <dd class="text-white font-mono">#{{ $brief->id }}</dd>
            </div>
            <div>
                <dt class="font-mono text-xs text-mute">Submitted</dt>
                <dd class="text-white">{{ $brief->created_at->format('Y-m-d H:i:s') }} UTC</dd>
            </div>
        </dl>
    </details>

    <div class="mt-10 flex flex-wrap gap-3">
        <a href="mailto:{{ $brief->email }}?subject=Re:%20Your%20brief%20—%20{{ urlencode($brief->brand) }}"
           class="btn-primary">
            Reply by email <span aria-hidden="true">↗</span>
        </a>
        <a href="{{ route('admin.index') }}" class="btn-ghost">Back to inbox</a>
    </div>
</section>
@endsection
