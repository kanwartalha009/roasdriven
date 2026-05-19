@php($footer = config('content.footer'))

<footer class="relative overflow-hidden border-t border-rule bg-ink mt-12">
    {{-- Decorative outlined wordmark --}}
    <div aria-hidden="true" class="pointer-events-none absolute inset-x-0 bottom-0 flex items-end justify-center opacity-[0.06]">
        <span class="font-display font-black tracking-tighter text-[clamp(120px,18vw,260px)] leading-none whitespace-nowrap"
              style="-webkit-text-stroke: 1px white; color: transparent;">
            ROAS<span style="-webkit-text-stroke: 1px var(--lift);">/</span>DRIVEN
        </span>
    </div>

    <div class="container-site relative z-10 pt-20 pb-12">
        {{-- Address + nav columns --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 pb-12">
            <div>
                <p class="eyebrow mb-3"><span class="slash">/</span> OFFICE</p>
                <p class="text-sm text-white/80">{{ $footer['address'] }}</p>
            </div>
            <div>
                <p class="eyebrow mb-3"><span class="slash">/</span> CONTACT</p>
                <a href="mailto:{{ $footer['email'] }}" class="text-sm text-white/80 hover:text-lift">
                    {{ $footer['email'] }}
                </a>
            </div>
            <div>
                <p class="eyebrow mb-3"><span class="slash">/</span> SOCIAL</p>
                <ul class="space-y-2">
                    @foreach($footer['social'] as $s)
                        <li>
                            <a href="{{ $s['url'] }}" class="text-sm text-white/80 hover:text-lift">{{ $s['label'] }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div>
                <p class="eyebrow mb-3"><span class="slash">/</span> SITEMAP</p>
                <ul class="space-y-2">
                    @foreach(config('content.nav') as $item)
                        <li>
                            <a href="{{ route($item['route']) }}" class="text-sm text-white/80 hover:text-lift">{{ $item['label'] }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        {{-- Bottom: copyright + legal --}}
        <div class="pt-8 border-t border-rule flex flex-col md:flex-row md:items-center md:justify-between gap-4 text-xs font-mono text-mute">
            <p>© {{ date('Y') }} ROAS/Driven — v1.0</p>
            <ul class="flex gap-6">
                @foreach($footer['legal'] as $l)
                    <li>
                        <a href="{{ route($l['route']) }}" class="hover:text-white">{{ $l['label'] }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</footer>
