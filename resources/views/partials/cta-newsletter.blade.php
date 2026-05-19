<section class="section">
    <div class="container-site">
        <div class="rounded-2xl border border-rule bg-surface-2 p-10 md:p-12">
            <div class="grid md:grid-cols-[2fr_1fr] gap-8 items-center">
                <div>
                    <h2 class="text-display-m font-display font-bold">
                        Not ready to talk? Get the audit checklist.
                    </h2>
                    <p class="mt-3 text-white/80 max-w-2xl">
                        The same 47-point Shopify + Klaviyo + Meta + Google audit we run on every new engagement. Free. One email.
                    </p>
                </div>
                <form action="#" method="POST" class="flex flex-col sm:flex-row gap-3">
                    @csrf
                    <label for="newsletter-email" class="sr-only">Email</label>
                    <input
                        id="newsletter-email"
                        name="email"
                        type="email"
                        required
                        placeholder="you@brand.com"
                        class="input flex-1"
                    >
                    <button type="submit" class="btn-primary">Send me the checklist</button>
                </form>
            </div>
        </div>
    </div>
</section>
