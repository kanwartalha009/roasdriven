@extends('admin.layout')

@section('title', 'Briefs')

@section('content')
<section class="container-site">

    <div class="flex flex-wrap items-end justify-between gap-4 mb-8">
        <div>
            <p class="font-mono text-caption uppercase tracking-wider text-mute">/ inbox</p>
            <h1 class="mt-2 text-display-m font-display font-bold leading-tight">Strategy briefs</h1>
            <p class="mt-2 text-sm text-white/70">
                {{ $total }} {{ Str::plural('brief', $total) }} received from <code class="font-mono text-mute">/book</code>.
            </p>
        </div>

        <form method="GET" action="{{ route('admin.index') }}" class="flex items-center gap-2">
            <label for="q" class="sr-only">Search</label>
            <input id="q"
                   name="q"
                   type="search"
                   value="{{ $search }}"
                   placeholder="Search name, email or brand"
                   class="input min-w-[260px]">
            <button type="submit" class="btn-primary">Search</button>
        </form>
    </div>

    {{-- Briefs table --}}
    <div class="rounded-2xl border border-rule bg-surface overflow-hidden">
        @if($briefs->isEmpty())
            <div class="p-12 text-center">
                <p class="text-display-m font-display font-bold mb-2">No briefs yet.</p>
                <p class="text-white/70">
                    When someone submits the form at <a href="{{ route('book') }}" class="text-lift">/book</a>, it'll land here.
                </p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="text-left bg-surface-2 border-b border-rule">
                        <tr class="font-mono uppercase text-[11px] tracking-wider text-mute">
                            <th class="px-4 py-3">Date</th>
                            <th class="px-4 py-3">Brand</th>
                            <th class="px-4 py-3">Contact</th>
                            <th class="px-4 py-3">Revenue / Spend</th>
                            <th class="px-4 py-3">Needs</th>
                            <th class="px-4 py-3 text-right"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-rule">
                        @foreach($briefs as $brief)
                            <tr class="hover:bg-surface-2/60 transition-colors">
                                <td class="px-4 py-4 align-top whitespace-nowrap">
                                    <p class="text-white">{{ $brief->created_at->format('M j, Y') }}</p>
                                    <p class="font-mono text-xs text-mute">{{ $brief->created_at->format('H:i') }}</p>
                                </td>
                                <td class="px-4 py-4 align-top">
                                    <p class="font-display font-bold text-white">{{ $brief->brand }}</p>
                                    @if($brief->url)
                                        <a href="{{ Str::startsWith($brief->url, ['http://','https://']) ? $brief->url : 'https://'.$brief->url }}"
                                           target="_blank" rel="noopener noreferrer"
                                           class="font-mono text-xs text-mute hover:text-lift">
                                            {{ Str::limit(preg_replace('#^https?://#', '', $brief->url), 32) }} ↗
                                        </a>
                                    @endif
                                </td>
                                <td class="px-4 py-4 align-top">
                                    <p class="text-white">{{ $brief->name }}</p>
                                    <a href="mailto:{{ $brief->email }}" class="text-xs text-lift">{{ $brief->email }}</a>
                                </td>
                                <td class="px-4 py-4 align-top">
                                    <p class="font-mono text-xs text-white/80">Rev: {{ $brief->revenue ?: '—' }}</p>
                                    <p class="font-mono text-xs text-white/80">Spend: {{ $brief->spend ?: '—' }}</p>
                                </td>
                                <td class="px-4 py-4 align-top">
                                    @if(!empty($brief->needs))
                                        <div class="flex flex-wrap gap-1">
                                            @foreach($brief->needs as $need)
                                                <span class="rounded-full bg-surface-2 border border-rule px-2 py-0.5 text-[11px] font-mono uppercase tracking-wider text-white/80">
                                                    {{ $need }}
                                                </span>
                                            @endforeach
                                        </div>
                                    @else
                                        <span class="text-mute">—</span>
                                    @endif
                                </td>
                                <td class="px-4 py-4 align-top text-right whitespace-nowrap">
                                    <a href="{{ route('admin.briefs.show', $brief) }}"
                                       class="inline-flex items-center gap-1 text-sm text-lift hover:underline">
                                        View <span aria-hidden="true">↗</span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="border-t border-rule px-4 py-3 bg-surface-2/50">
                {{ $briefs->links() }}
            </div>
        @endif
    </div>
</section>
@endsection
