@props(['metric'])

@php
    $tone = $metric['tone'] ?? 'default';
    $bg = match($tone) {
        'lift'    => 'bg-lift text-ink',
        'pop'     => 'bg-pop text-ink',
        'heat'    => 'bg-heat text-ink',
        default   => 'bg-surface text-white border border-rule',
    };
    $captionClass = $tone === 'default' ? 'text-mute' : 'text-ink/80';
@endphp

<div class="rounded-2xl {{ $bg }} p-6 flex flex-col gap-4 min-h-[180px] justify-between card-hover">
    <p class="font-mono text-caption uppercase tracking-wider {{ $captionClass }}">
        {{ $metric['caption'] }}
    </p>

    @if(!empty($metric['list']))
        <ul class="space-y-1.5">
            @foreach($metric['list'] as $item)
                <li class="text-base font-display font-bold">{{ $item }}</li>
            @endforeach
        </ul>
    @else
        <div>
            <p class="text-display-m font-display font-bold leading-none tracking-tight">
                {{ $metric['value'] }}
            </p>
            @if(!empty($metric['delta']))
                <p class="mt-2 font-mono text-sm {{ $tone === 'default' ? 'text-lift' : 'text-ink/80' }}">
                    {{ $metric['delta'] }}
                </p>
            @endif

            {{-- Optional mini bar chart (set chart: true on the metric in config). --}}
            @if(!empty($metric['chart']))
                @php
                    // Twelve fixed bars — gentle upward trend.
                    $bars = [22, 32, 28, 41, 38, 52, 48, 64, 58, 75, 70, 88];
                    $barColor = $tone === 'default' ? 'bg-lift' : 'bg-ink/40';
                @endphp
                <div class="mt-4 flex items-end gap-1 h-10" aria-hidden="true">
                    @foreach($bars as $h)
                        <span class="flex-1 {{ $barColor }} rounded-sm" style="height: {{ $h }}%"></span>
                    @endforeach
                </div>
            @endif
        </div>
    @endif

    @if(!empty($metric['footnote']))
        <p class="font-mono text-xs {{ $captionClass }}">
            {{ $metric['footnote'] }}
        </p>
    @endif
</div>
