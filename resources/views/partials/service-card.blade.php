@props(['discipline'])

<a href="{{ route('services.show', $discipline['slug']) }}"
   class="group block rounded-2xl border border-rule bg-surface p-8 card-hover">
    <div class="flex items-center justify-between mb-6">
        <span class="font-mono text-caption uppercase tracking-wider text-lift">/{{ $discipline['n'] }}</span>
        <span class="text-lift text-xl transition-transform group-hover:translate-x-1" aria-hidden="true">↗</span>
    </div>
    <h3 class="text-heading font-display font-bold mb-3">{{ $discipline['name'] }}</h3>
    <p class="text-white/70 leading-relaxed">{{ $discipline['short'] }}</p>
</a>
