@php($spots = config('content.brand.spots'))

<section class="section">
    <div class="container-site">
        <div class="rounded-2xl border border-rule bg-surface p-10 md:p-16 grid md:grid-cols-2 gap-10 items-center">
            <div>
                <p class="eyebrow mb-4"><span class="slash">/</span> {{ $spots }}</p>
                <h2 class="text-display-l font-display font-bold leading-tight">
                    Let's talk numbers.
                </h2>
                <p class="mt-4 text-subhead text-white/80 max-w-xl">
                    We onboard a small number of new brands each quarter. Book a 30-minute strategy call — we'll tell you within 30 minutes whether we can move the needle.
                </p>
            </div>
            <div class="flex flex-wrap gap-4 md:justify-end">
                <a href="{{ route('book') }}" class="btn-primary">
                    Book strategy call <span aria-hidden="true">↗</span>
                </a>
            </div>
        </div>
    </div>
</section>
