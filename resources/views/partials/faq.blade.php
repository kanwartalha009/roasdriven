@props(['items', 'headline' => 'Quick answers.'])

<section class="section">
    <div class="container-site">
        <h2 class="text-display-m font-display font-bold mb-10">{{ $headline }}</h2>

        <div data-faq class="divide-y divide-rule border-y border-rule">
            @foreach($items as $i => $item)
                <div data-faq-item class="group">
                    <button
                        type="button"
                        data-faq-trigger
                        aria-expanded="false"
                        aria-controls="faq-panel-{{ $i }}"
                        class="w-full flex items-center justify-between py-6 text-left gap-6 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-lift"
                    >
                        <span class="text-heading md:text-display-m font-display font-bold leading-tight">
                            {{ $item['q'] }}
                        </span>
                        <span class="shrink-0 inline-flex items-center justify-center w-10 h-10 rounded-full border border-rule text-lift text-xl transition-transform group-[[data-open]]:rotate-45" aria-hidden="true">+</span>
                    </button>
                    <div
                        id="faq-panel-{{ $i }}"
                        data-faq-panel
                        style="max-height: 0"
                        class="overflow-hidden transition-[max-height] duration-300 ease-site"
                    >
                        <p class="pb-6 text-white/80 leading-relaxed max-w-3xl">
                            {{ $item['a'] }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
