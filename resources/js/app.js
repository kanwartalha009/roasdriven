import './bootstrap';

/* ---------------------------------------------------------------------------
 * Nav: solid background after 40px scroll
 * ------------------------------------------------------------------------ */
const nav = document.querySelector('[data-nav]');
if (nav) {
    const onScroll = () => {
        if (window.scrollY > 40) {
            nav.classList.add('is-scrolled');
        } else {
            nav.classList.remove('is-scrolled');
        }
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
}

/* ---------------------------------------------------------------------------
 * Mobile nav: hamburger toggles full-screen overlay
 * ------------------------------------------------------------------------ */
const burger = document.querySelector('[data-mobile-toggle]');
const overlay = document.querySelector('[data-mobile-overlay]');
if (burger && overlay) {
    burger.addEventListener('click', () => {
        const open = overlay.classList.toggle('is-open');
        burger.setAttribute('aria-expanded', open);
        document.body.style.overflow = open ? 'hidden' : '';
    });
    overlay.querySelectorAll('a').forEach((link) => {
        link.addEventListener('click', () => {
            overlay.classList.remove('is-open');
            burger.setAttribute('aria-expanded', 'false');
            document.body.style.overflow = '';
        });
    });
}

/* ---------------------------------------------------------------------------
 * FAQ accordion (one open at a time)
 * ------------------------------------------------------------------------ */
document.querySelectorAll('[data-faq]').forEach((root) => {
    root.querySelectorAll('[data-faq-item]').forEach((item) => {
        const button = item.querySelector('[data-faq-trigger]');
        const panel = item.querySelector('[data-faq-panel]');
        if (!button || !panel) return;

        button.addEventListener('click', () => {
            const isOpen = item.hasAttribute('data-open');

            // Close siblings
            root.querySelectorAll('[data-faq-item][data-open]').forEach((sib) => {
                sib.removeAttribute('data-open');
                const b = sib.querySelector('[data-faq-trigger]');
                const p = sib.querySelector('[data-faq-panel]');
                if (b) b.setAttribute('aria-expanded', 'false');
                if (p) p.style.maxHeight = '0px';
            });

            if (!isOpen) {
                item.setAttribute('data-open', '');
                button.setAttribute('aria-expanded', 'true');
                panel.style.maxHeight = panel.scrollHeight + 'px';
            }
        });
    });
});

/* ---------------------------------------------------------------------------
 * Roster filter (/work): chips filter brand cards by data-niche
 * ------------------------------------------------------------------------ */
document.querySelectorAll('[data-roster]').forEach((root) => {
    const filterRow = root.querySelector('[data-roster-filters]');
    const grid      = root.querySelector('[data-roster-grid]');
    const empty     = root.querySelector('[data-roster-empty]');
    if (!filterRow || !grid) return;

    const chips = filterRow.querySelectorAll('[data-filter]');
    const cards = grid.querySelectorAll('[data-brand-card]');

    chips.forEach((chip) => {
        chip.addEventListener('click', () => {
            const target = chip.dataset.filter;

            // Toggle chip states
            chips.forEach((c) => {
                const active = c === chip;
                c.classList.toggle('is-active', active);
                c.setAttribute('aria-pressed', active);
            });

            // Toggle card visibility
            let visible = 0;
            cards.forEach((card) => {
                const match = target === 'all' || card.dataset.niche === target;
                card.hidden = !match;
                if (match) visible++;
            });

            // Empty state
            if (empty) empty.hidden = visible !== 0;
        });
    });
});

/* ---------------------------------------------------------------------------
 * Count-up: single fire on viewport entry, respects reduced motion
 * ------------------------------------------------------------------------ */
const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

if (!prefersReducedMotion && 'IntersectionObserver' in window) {
    const counters = document.querySelectorAll('[data-countup]');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) return;
            const el = entry.target;
            if (el.dataset.fired) return;
            el.dataset.fired = '1';

            const target = parseFloat(el.dataset.countup);
            const decimals = parseInt(el.dataset.decimals || '0', 10);
            const prefix = el.dataset.prefix || '';
            const suffix = el.dataset.suffix || '';
            const duration = 1200;
            const start = performance.now();

            const tick = (now) => {
                const elapsed = Math.min((now - start) / duration, 1);
                const eased = 1 - Math.pow(1 - elapsed, 3); // ease-out cubic
                const current = target * eased;
                el.textContent = prefix + current.toFixed(decimals) + suffix;
                if (elapsed < 1) requestAnimationFrame(tick);
            };
            requestAnimationFrame(tick);

            observer.unobserve(el);
        });
    }, { threshold: 0.4 });

    counters.forEach((c) => observer.observe(c));
}
