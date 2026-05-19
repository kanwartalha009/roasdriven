<?php

/*
|--------------------------------------------------------------------------
| Site Content
|--------------------------------------------------------------------------
|
| All copy lives here so views stay structural. Brackets like [$XXM], [4.Xx],
| [XX]%, [Brand A] are intentional placeholders — a launch-prep grep should
| catch them all before production deploy.
|
*/

return [

    /* --------------------------------------------------------------------
     | Brand
     * ----------------------------------------------------------------- */
    'brand' => [
        'wordmark' => 'ROAS/Driven',
        'tagline'  => 'Ecommerce that prints revenue. Not promises.',
        'spots'    => '● 2 spots · Q3 2026',
    ],

    /* --------------------------------------------------------------------
     | Navigation
     * ----------------------------------------------------------------- */
    'nav' => [
        ['label' => 'Services', 'route' => 'services.index'],
        ['label' => 'Work',     'route' => 'work.index'],
        ['label' => 'About',    'route' => 'about'],
        ['label' => 'Journal',  'route' => 'journal.index'],
    ],

    /* --------------------------------------------------------------------
     | Homepage
     * ----------------------------------------------------------------- */
    'home' => [
        'hero' => [
            'eyebrow'  => '/ BARCELONA · OPERATING ACROSS THE EU & LATAM',
            // Split-color headline: parts marked tone="lift" render in lime.
            'headline_parts' => [
                ['text' => 'Ecommerce that '],
                ['text' => 'prints revenue', 'tone' => 'lift'],
                ['text' => ', not promises.'],
            ],
            'headline' => 'Ecommerce that prints revenue, not promises.', // plain fallback for <title> etc.
            'sub'      => "We're the senior growth team behind Ölend, Flabelus, Banoffee BCN and a handful of other ambitious Spanish brands. Paid media, CRO, lifecycle, creative & Shopify engineering — under one roof, at one P&L.",
            'cta_primary'   => ['label' => 'Book a strategy call', 'route' => 'book'],
            'cta_secondary' => ['label' => 'See the receipts',     'route' => 'work.index'],
        ],

        // Primary metric strip — 3 large cards with full chrome.
        'metrics' => [
            [
                'caption'  => 'REVENUE · LAST 90',
                'value'    => '€2.18M',
                'delta'    => '+38%',
                'footnote' => 'Across 5 brands',
                'tone'     => 'default',
                'chart'    => true, // mini bar chart on this card
            ],
            [
                'caption'  => 'AVG ROAS POST ENGAGEMENT',
                'value'    => '4.7×',
                'footnote' => 'From 2.1× pre-engagement',
                'tone'     => 'pop',
            ],
            [
                'caption'  => 'WHAT WE LIFT',
                'value'    => null,
                'list'     => [
                    'Conversion rate +18%',
                    'AOV +12%',
                    'Email/SMS share 28%',
                ],
                'tone'     => 'default',
            ],
        ],

        // Secondary stats — flat row of 4 quick proof points under the cards.
        'stats' => [
            ['value' => '€18M+', 'label' => 'REVENUE MANAGED'],
            ['value' => '6',     'label' => 'ACTIVE BRANDS'],
            ['value' => '17',    'label' => 'SENIOR OPERATORS'],
            ['value' => '0',     'label' => 'JUNIOR ACCOUNT MANAGERS'],
        ],

        'logo_bar_caption' => 'TRUSTED BY AMBITIOUS BRANDS ACROSS EUROPE & LATAM',

        // Standouts surfaced on the homepage logo bar (per mockup).
        // The full roster lives in the top-level `clients` key and is rendered on /work.
        'logos' => [
            ['name' => 'Ölend',             'domain' => 'olend.net'],
            ['name' => 'Ölend Wholesale',   'domain' => 'olendwholesale.com'],
            ['name' => 'Flabelus',          'domain' => 'flabelus.com'],
            ['name' => 'Philippa',          'domain' => 'philippa1970.com'],
            ['name' => 'Alhaja Store',      'domain' => 'alhajastore.com'],
        ],

        'disciplines' => [
            'caption'  => '/ CAPABILITIES',
            'headline' => 'Six disciplines. One outcome.',
            'sub'      => "We don't sell channels — we sell growth. Every layer required to ship revenue lives inside the same team.",
        ],

        'editorial_break' => [
            'eyebrow'  => '/ THE POINT',
            'headline' => 'We move numbers. Not vibes.',
            'body'     => 'Every Tuesday we ship a new test. Every Friday you get the live numbers. No decks, no slop, no "quarterly readout" theatre. If a week is boring, something is broken — and we tell you before you ask.',
        ],

        'proof' => [
            'caption'  => '/ RECEIPTS',
            'headline' => 'Proof, not pitches.',
        ],

        'how' => [
            'caption'  => '/ HOW WE OPERATE',
            'headline' => 'A real team. Senior operators only.',
            'sub'      => 'Four phases, one cadence. Two weeks to plan, every week to ship.',
            'phases'   => [
                ['n' => '01', 'tone' => 'lift',  'title' => 'Audit.',     'body' => 'Two weeks. Ad accounts, GA, Shopify, Klaviyo, checkout flow, tech debt — fully picked apart.'],
                ['n' => '02', 'tone' => 'white', 'title' => 'Plan.',      'body' => "A 90-day plan tied to revenue, not vanity. You sign off before we spend €1."],
                ['n' => '03', 'tone' => 'pop',   'title' => 'Ship.',      'body' => 'Creative + media + dev land week one. New tests every Tuesday — boring weeks are forbidden.'],
                ['n' => '04', 'tone' => 'heat',  'title' => 'Compound.',  'body' => 'Weekly numbers. Quarterly roadmap. Full Looker dashboard. Zero "set & forget" energy.'],
            ],
        ],

        'stack' => [
            'caption'  => '/ STACK',
            'headline' => 'We build on the best.',
            'partners' => [
                ['name' => 'Shopify Plus',  'status' => 'pending'],
                ['name' => 'Klaviyo Master','status' => 'pending'],
                ['name' => 'Meta Business', 'status' => 'pending'],
                ['name' => 'Google Premier','status' => 'pending'],
                ['name' => 'TikTok Marketing', 'status' => 'pending'],
            ],
        ],
    ],

    /* --------------------------------------------------------------------
     | Disciplines / services (homepage cards + overview cards)
     * ----------------------------------------------------------------- */
    'disciplines' => [
        ['n' => '01', 'slug' => 'paid-media',            'name' => 'Paid media',
         'short' => 'Meta, Google, TikTok, YouTube. Performance creative + bottom-up media buying for DTC across GCC, EU, and US.'],
        ['n' => '02', 'slug' => 'cro-and-ux',            'name' => 'CRO & UX',
         'short' => 'Quizzes, on-site personalization, ship-quality A/B tests, mobile-PDP fixes. The work that lifts checkout conversion before you spend a dollar more on ads.'],
        ['n' => '03', 'slug' => 'lifecycle-email-sms',   'name' => 'Lifecycle (Email/SMS)',
         'short' => 'Klaviyo flows, segmentation, and campaigns that turn 25–35% of revenue into a channel you actually own.'],
        ['n' => '04', 'slug' => 'shopify-development',   'name' => 'Shopify development',
         'short' => 'Theme work, headless Hydrogen, Shopify Plus apps, B2B portals, and the integrations that scale your stack — not break it.'],
        ['n' => '05', 'slug' => 'creative-and-content',  'name' => 'Creative & content',
         'short' => 'TikTok-native UGC, branded video, full content production engineered for ad performance, not aesthetics-first.'],
        ['n' => '06', 'slug' => 'seo',                    'name' => 'SEO',
         'short' => 'Technical SEO, commercial-intent content, and authority building. Organic revenue contribution — not vanity rankings.'],
        ['n' => '07', 'slug' => 'ai-optimization',        'name' => 'AI optimization',
         'short' => 'AI-scored creative variants, AI-drafted lifecycle copy, AI-driven cohort modeling. AI workflows that ship — not AI demos that don\'t.'],
    ],

    /* --------------------------------------------------------------------
     | Service detail pages
     * ----------------------------------------------------------------- */
    'services' => [
        'paid-media' => [
            'eyebrow'  => '/ SERVICE · PAID MEDIA',
            'headline' => 'Paid media that compounds. Not a hamster wheel.',
            'sub'      => 'Meta, Google, TikTok, YouTube, Pinterest. Performance creative paired with bottom-up media buying for DTC brands across GCC, EU, and US.',
            'cta_primary' => 'Talk to a senior paid media operator',
            'lede_title'  => 'Performance media for DTC, end to end.',
            'lede'        => "Most agencies sell you channels. We sell you a system. Strategy, creative, buying, and analytics are owned by the same person on your account. There's no \"I'll ask the media buyer.\" Your senior operator owns the P&L for every platform we run. Performance creative is briefed against learnings from yesterday, not against a quarterly content calendar. Buying decisions are made daily, off real signal, not a Monday-morning report.",
            'how' => [
                ['title' => 'Audit and account architecture', 'body' => "Two weeks to rebuild account structure: campaign types, audience structure, attribution, CAPI/Conversion API, naming convention. We don't inherit your old mess."],
                ['title' => 'Creative pipeline',              'body' => 'We ship 12–20 net-new creative concepts per month per channel. Briefed against post-mortem of last month\'s winners. UGC + branded + iteration loops.'],
                ['title' => 'Buying cadence',                 'body' => 'Daily checks on accounts, weekly creative scoring, monthly P&L review. Tuesday tests, Friday numbers.'],
                ['title' => 'Reporting that you can use',     'body' => 'Looker Studio dashboard with blended ROAS, CAC, share-of-spend, contribution margin. Not platform vanity.'],
            ],
            'scope' => [
                'Ad-account audit + 90-day plan',
                'CAPI / Conversion API / Enhanced Conversions setup verified',
                'Net-new creative concepts shipped monthly',
                'Creative scoring and retirement protocol',
                'Weekly Loom recap + monthly P&L call',
                'Looker Studio attribution dashboard',
                'Daily account management (not weekly)',
            ],
            'good' => [
                'Blended ROAS lift of 1.5–2.5× vs. baseline within 90 days',
                'CAC reduction of 15–30% via creative iteration',
                'Scale to 2–3× ad spend without ROAS collapse',
                'Creative win-rate of 25%+ on net-new tests',
            ],
            'faq' => [
                ['q' => 'Do you take over our existing accounts?', 'a' => 'Yes. We audit first, rebuild structure inside the first two weeks, and migrate without losing learning. We never start fresh "just because" — historical data is valuable.'],
                ['q' => 'What ad spend levels make sense?',       'a' => 'Minimum $20K/month total paid media spend for the engagement to be worth your money. Below that, fixed agency cost eats too much of the lever.'],
                ['q' => 'Will you brief and produce creative?',    'a' => 'Yes. Creative is part of the engagement. UGC, branded, statics, video — the whole pipeline.'],
            ],
        ],

        'cro-and-ux' => [
            'eyebrow'  => '/ SERVICE · CRO & UX',
            'headline' => 'Conversion you can compound. Not opinions.',
            'sub'      => 'On-site personalization, mobile-PDP fixes, ship-quality A/B tests, quizzes, and checkout work. The conversion lever before you spend a dollar more on ads.',
            'cta_primary' => 'Talk to a senior CRO operator',
            'lede_title'  => 'CRO that ships, not CRO that talks.',
            'lede'        => 'Most CRO consultants give you a 60-slide audit and disappear. We ship the change. Our team includes a senior conversion strategist and a Shopify engineer on every CRO engagement, so the recommendation and the deployment live in the same Slack channel. We work in 12-week sprints with hard outcome targets — "mobile PDP CVR +15%," "cart abandonment recovery to 18%," "search CVR to category-page CVR parity." We audit Microsoft Clarity, GA4, and Triple Whale together, not in isolation.',
            'how' => [
                ['title' => 'Diagnostic',         'body' => 'Microsoft Clarity heatmaps, GA4 funnel, Triple Whale post-purchase survey, mobile-PDP teardown. We tell you where the leak is, not where the audit template says it should be.'],
                ['title' => 'Test backlog',       'body' => "Prioritized backlog of 20–30 tests scored on ICE (impact, confidence, ease). We don't test font sizes — we test page architecture, copy hierarchy, offer structure, and PDP UX."],
                ['title' => 'Ship-quality tests', 'body' => 'Tests are coded, not Shogun-dragged. They survive theme updates and load fast. We use GrowthBook or VWO depending on stack.'],
                ['title' => 'Compound',           'body' => "Winners get baked into the theme. Losers get post-mortemed. The whole sprint is documented so the next agency doesn't have to start over."],
            ],
            'scope' => [
                'Microsoft Clarity + GA4 + Triple Whale audit',
                'Mobile PDP, cart, and checkout teardown',
                '20+ prioritized test backlog',
                '8–12 tests shipped per quarter',
                'Senior conversion strategist + Shopify engineer paired',
                'Test post-mortems written, not verbal',
                'Winners deployed to production theme, not left in test tool',
            ],
            'good' => [
                'Mobile PDP CVR +10–20% within one sprint',
                'Checkout completion +5–12%',
                'AOV +8–15% via cart UX and offer structure',
                'Documented test win-rate 30%+',
            ],
            'faq' => [
                ['q' => 'What tools do you use?',         'a' => "Microsoft Clarity for heatmaps, GA4 for funnels, Triple Whale for attribution, GrowthBook or VWO for testing depending on your stack. We don't care about the tool — we care about the insight."],
                ['q' => 'Do you also build the changes?', 'a' => 'Yes. A senior Shopify engineer is on every CRO engagement. The recommendation and the deployment live in the same team.'],
                ['q' => 'How many tests will we run?',     'a' => "8–12 per quarter. Quality over volume. A test that doesn't change anything is just noise."],
            ],
        ],

        'lifecycle-email-sms' => [
            'eyebrow'  => '/ SERVICE · LIFECYCLE',
            'headline' => 'Email and SMS that actually own 25–35% of revenue.',
            'sub'      => 'Klaviyo and Postscript builds, flow audits, segmentation, and campaigns. Lifecycle that owns its share of revenue — not lifecycle that runs three flows from 2022.',
            'cta_primary' => 'Talk to a senior lifecycle operator',
            'lede_title'  => 'Lifecycle as a channel, not as an automation.',
            'lede'        => 'Email and SMS are the only channels you actually own. Most brands run a welcome flow, an abandoned cart flow, and call it a lifecycle program. We rebuild lifecycle as a real channel: segmented audiences, dynamic content, post-purchase paths, win-back logic, and campaign cadence. We start with a flow audit (every flow, every email, every URL) and rebuild from the foundation up. Klaviyo Master Partners on the team. We also fix the silent killers: dead conversion metrics, duplicate-metric attribution, broken CTA URLs, and the variant-URL diffusion problem that destroys click tracking.',
            'how' => [
                ['title' => 'Klaviyo audit',         'body' => 'Every flow, every email, every campaign. We map URL grouping, click-to-open rates, revenue per recipient, and metric attribution. We find the dead flows and the silent-killer technical bugs.'],
                ['title' => 'Architecture rebuild',  'body' => 'Welcome, browse abandonment, cart abandonment, post-purchase, replenishment, win-back, sunset — each rebuilt with proper segmentation and dynamic content blocks.'],
                ['title' => 'Campaign engine',       'body' => 'Monthly campaign calendar tied to product launches, seasonal moments, and behavioral triggers. Not "a newsletter every Tuesday."'],
                ['title' => 'Continuous testing',    'body' => 'Subject line tests, send-time tests, offer tests, segmentation tests — documented, won, baked in.'],
            ],
            'scope' => [
                'Full Klaviyo / Postscript audit + click-URL diagnostics',
                '8–12 flows rebuilt with dynamic content',
                'Segmentation strategy and audience taxonomy',
                'Monthly campaign calendar and execution',
                'A/B testing program on subject, send time, offer',
                'Looker Studio lifecycle revenue dashboard',
                'Compliance (GDPR / CASL / PDPL for UAE) audit',
            ],
            'good' => [
                'Email/SMS share of revenue → 25–35%',
                'Flow revenue +50–150% within first quarter',
                'Unsubscribe rate < 0.3% post-rebuild',
                'Cart abandonment flow recovery rate > 12%',
            ],
            'faq' => [
                ['q' => "We're already on Klaviyo. Do you migrate us?", 'a' => 'No — we work inside your existing Klaviyo. We audit, rebuild flows, and run campaigns in your account, not a new one.'],
                ['q' => 'Do you do SMS as well as email?',              'a' => 'Yes. Postscript or Klaviyo SMS depending on your market. UAE/GCC SMS compliance is its own thing and we know it.'],
                ['q' => 'Will we own the work?',                        'a' => 'Yes. Every flow, segment, and template lives in your Klaviyo account. If you fire us, you keep everything.'],
            ],
        ],

        'shopify-development' => [
            'eyebrow'  => '/ SERVICE · SHOPIFY DEV',
            'headline' => 'Shopify engineering built for performance, not for the demo.',
            'sub'      => 'Theme work, headless Hydrogen, Shopify Plus apps, B2B portals, and integrations. Production-grade code engineered for ad performance and conversion — not for the Figma file.',
            'cta_primary' => 'Talk to a senior Shopify operator',
            'lede_title'  => 'Shopify development for brands that ship.',
            'lede'        => 'We build on Shopify because Shopify is the best DTC platform on the planet. But most Shopify themes are slow, brittle, and add 800ms of LCP to your store — which destroys your paid ROAS. We build performance-first themes (Liquid + Hydrogen as needed), custom apps for the gaps Shopify doesn\'t cover, and B2B portals for brands with wholesale revenue. Every build is benchmarked for Core Web Vitals, mobile performance, and ad-platform compatibility — not just for the design review.',
            'how' => [
                ['title' => 'Theme work',              'body' => 'Custom theme work on Dawn, Impulse, or your existing theme. Performance-first. LCP < 1.8s on mobile, INP < 200ms, CLS < 0.05. Non-negotiable.'],
                ['title' => 'Headless when it makes sense', 'body' => "Hydrogen / Remix / Next.js storefronts for brands at scale. We don't recommend headless to everyone — most brands don't need it. When you do, we ship it."],
                ['title' => 'Apps and integrations',   'body' => 'Custom Shopify Plus apps, B2B portals, ERP integrations, multi-currency, multi-language (Translate & Adapt). Built to spec, owned by you.'],
                ['title' => 'Maintenance',             'body' => "We don't disappear after launch. Monthly performance audit, quarterly tech-debt review, ad-hoc bug-fix SLA."],
            ],
            'scope' => [
                'Theme audit (performance + ad compatibility)',
                'Custom theme build or refactor',
                'Headless (Hydrogen / Next.js) when warranted',
                'Custom Shopify Plus apps (public or private)',
                'B2B portal and wholesale features',
                'Multi-currency, multi-language, Translate & Adapt',
                'Klaviyo, Triple Whale, Postscript, Recharge integrations',
                'Maintenance and SLA',
            ],
            'good' => [
                'Mobile LCP < 1.8s',
                'INP < 200ms / CLS < 0.05',
                'Theme code that survives Shopify version upgrades',
                'Apps shipped to Shopify App Store (where applicable)',
            ],
            'faq' => [
                ['q' => 'Are you Shopify Plus Partners?',                 'a' => '[Confirm with client — leave as "pending partner status" until confirmed].'],
                ['q' => 'Do you migrate from WooCommerce / Magento?',     'a' => 'Yes. Migration is a defined scope with a fixed price.'],
                ['q' => 'Can you build a custom Shopify app for us?',     'a' => "Yes. Public or private. We've built billing, subscription, customer-portal, and B2B portal apps."],
            ],
        ],

        'creative-and-content' => [
            'eyebrow'  => '/ SERVICE · CREATIVE',
            'headline' => 'Creative briefed against revenue. Not against a moodboard.',
            'sub'      => 'TikTok-native UGC, branded video, statics, motion. Full content production engineered for ad performance, not aesthetics-first.',
            'cta_primary' => 'Talk to a senior creative operator',
            'lede_title'  => "Creative that's designed to win in the auction.",
            'lede'        => 'Creative is the lever in 2026. Targeting is flat, bidding is automated, and the only meaningful difference between a 1x ROAS account and a 4x ROAS account is the creative. We brief creative against post-mortems of last month\'s winners, not against quarterly content calendars. We produce UGC with vetted creators in GCC, EU, and US markets. We script and edit performance-first — thumb-stop in 0.6 seconds, hook in 1.5, value-prop in 3. Branded shoots only when the brand demands it. The rest is UGC, statics, and motion graphics.',
            'how' => [
                ['title' => 'Briefing',           'body' => 'Every creative is briefed against a specific hypothesis tied to a previous winner or hypothesized gap. No moodboards, no "make it pop."'],
                ['title' => 'Creator network',    'body' => 'Vetted UGC creators in GCC, EU, and US. Brand-safe, performance-trained, paid against output — not engagement.'],
                ['title' => 'Production',         'body' => 'We script, shoot, and edit. Or we direct your in-house team if you have one. Either way the output is briefed against ad performance, not aesthetic theory.'],
                ['title' => 'Scoring & iteration','body' => 'Every creative is scored against benchmarks. Winners get iterated into 5–10 variants. Losers get post-mortemed and the learning is documented.'],
            ],
            'scope' => [
                'Monthly creative production budget (12–20 concepts)',
                'UGC creator sourcing and management',
                'Statics and motion design',
                'Scripted UGC + branded video shoots',
                'Performance scoring (CTR, hold rate, ROAS)',
                'Creative library and versioning',
            ],
            'good' => [
                'Creative win-rate 25%+',
                'Hold-rate +20% vs. baseline',
                'Creative refresh cadence of 12+ concepts/month',
            ],
            'faq' => [
                ['q' => 'Do you have UGC creators in our market?', 'a' => 'Yes — in GCC, EU, and US. We vet for brand safety, content quality, and performance history.'],
                ['q' => 'Do you do branded shoots?',                'a' => 'Yes, when the brand requires it. For most DTC brands, UGC + motion graphics produces better paid performance for less cost.'],
                ['q' => 'Who owns the creative?',                   'a' => 'You. Full rights to every asset we produce.'],
            ],
        ],

        'seo' => [
            'eyebrow'  => '/ SERVICE · SEO',
            'headline' => 'SEO that contributes to the P&L. Not vanity rankings.',
            'sub'      => 'Technical SEO, content strategy, and authority-building for DTC brands. Built for organic revenue contribution, not for traffic charts that don\'t convert.',
            'cta_primary' => 'Talk to a senior SEO operator',
            'lede_title'  => 'SEO for ecommerce, focused on revenue — not traffic.',
            'lede'        => "Most SEO agencies will sell you a traffic chart. We sell you organic revenue contribution. Our SEO work integrates with paid, lifecycle, and CRO — because category and collection pages that rank also need to convert. We focus on three pillars: technical SEO (so the store actually crawls), commercial-intent content (so the traffic converts), and authority signals (so you compound over 12+ months). For DTC brands, this usually means category-page architecture, schema-rich product pages, and a journal that supports commercial intent.",
            'how' => [
                ['title' => 'Technical audit',                  'body' => 'Crawl, index, schema, canonical structure, faceted nav, hreflang. We fix the structural mess before we write a single piece of content.'],
                ['title' => 'Commercial-intent keyword mapping','body' => "We map keyword intent to category, collection, product, and journal pages. We don't target keywords with no buying intent."],
                ['title' => 'Content sprints',                  'body' => 'Editorial calendar of journal posts and category descriptions. Each piece is mapped to one keyword and one CTA.'],
                ['title' => 'Authority',                        'body' => 'Digital PR, partnership content, podcast placements, and editorial backlinks. Manual, slow, compounding.'],
            ],
            'scope' => [
                'Technical SEO audit (Ahrefs + Screaming Frog + Search Console)',
                'Schema markup for org, product, FAQ, BreadcrumbList, Review',
                'Category and collection page architecture',
                'Commercial-intent content sprint (2 posts / month minimum)',
                'Digital PR and outreach',
                'Monthly Looker dashboard for organic revenue contribution',
            ],
            'good' => [
                'Organic revenue +30–80% YoY',
                'Top-10 ranking on 30–100+ commercial-intent keywords',
                'Branded search lift via authority work',
            ],
            'faq' => [
                ['q' => 'How long until we see results?',        'a' => 'Technical fixes show up in 4–8 weeks. Content and authority work compound over 6–12 months.'],
                ['q' => 'Do you work on local SEO for GCC?',      'a' => 'Yes. Arabic-language SEO is its own thing and we partner with native-language editors.'],
            ],
        ],

        'ai-optimization' => [
            'eyebrow'  => '/ SERVICE · AI OPTIMIZATION',
            'headline' => "AI workflows that ship. Not AI demos that don't.",
            'sub'      => 'AI-powered creative scoring, automated CRO test generation, agent-driven lifecycle copy, and cohort modeling. The AI work other agencies are still figuring out.',
            'cta_primary' => 'Talk to a senior AI operator',
            'lede_title'  => 'AI as a force multiplier on every other discipline.',
            'lede'        => 'Every agency talks about AI. We ship AI workflows that produce real revenue. Our AI work isn\'t a separate "AI service" — it\'s embedded in everything else: AI-scored creative variants in paid, AI-generated lifecycle copy in Klaviyo, AI-summarized customer reviews on PDPs, AI-driven cohort modeling for forecasting. We use Claude, GPT, and custom in-house models depending on the workflow. We have a working internal lead-enrichment agent ("Midas") and have shipped AI workflows in production for multiple clients.',
            'how' => [
                ['title' => 'Workflow design', 'body' => 'We start with the bottleneck. Is creative briefing slow? Is lifecycle copy generic? Is forecasting weak? We build a workflow against the bottleneck — not a chatbot for its own sake.'],
                ['title' => 'Tooling',         'body' => 'Claude, GPT, custom fine-tuned models, MCP integrations, n8n / Make / Zapier when warranted. Choice depends on workflow, not on hype.'],
                ['title' => 'Ship',            'body' => 'Production deployment. Logging, monitoring, eval loops. AI that fails silently is worse than no AI.'],
                ['title' => 'Hand off',        'body' => 'Your team can run it. We document everything. No black-box dependency on us.'],
            ],
            'scope' => [
                'AI-scored creative variant generation',
                'AI-drafted lifecycle email and SMS copy (Klaviyo MCP)',
                'AI-driven cohort modeling and LTV prediction',
                'PDP review summarization and FAQ generation',
                'Custom internal agents (lead enrichment, content drafting, audit automation)',
                'Eval loop and monitoring',
                'Documentation and team handoff',
            ],
            'good' => [
                'Creative production velocity 3–5×',
                'Lifecycle copy production 5–10×',
                'Forecast accuracy +20–40% via cohort modeling',
            ],
            'faq' => [
                ['q' => 'Are you using AI or just talking about it?', 'a' => 'Both. We use AI internally for audit automation, lead enrichment, and creative scoring. We ship AI workflows in client production. We can show you the workflows in a strategy call.'],
                ['q' => 'Will AI replace humans on the account?',     'a' => 'No. AI amplifies the senior operator. The operator still owns the strategy, the creative direction, and the P&L. AI handles the volume work.'],
            ],
        ],
    ],

    /* --------------------------------------------------------------------
     | Case studies (3 placeholders)
     * ----------------------------------------------------------------- */
    'cases' => [
        [
            'slug'          => 'olend',
            'industry'      => 'Bags',
            'market'        => 'EU',
            'services'      => ['Paid', 'CRO', 'Lifecycle', 'Shopify'],
            'tags'          => ['WHOLESALE', 'B2B'],
            'name'          => 'Ölend',
            'hero_metric'   => '+184%',
            'hero_tone'     => 'lift',
            'hero_label'    => 'REVENUE YOY',
            'descriptor'    => 'Two-storefront wholesale push doubled net B2B revenue while D2C ROAS climbed from 2.1× to 4.6×.',
            'subhead'       => 'Two-storefront rebuild + paid relaunch took blended ROAS from 2.1× to 4.6× and net B2B revenue +184% YoY.',
            'metrics' => [
                ['caption' => 'REVENUE YOY',  'value' => '+184%',                   'tone' => 'lift'],
                ['caption' => 'BLENDED ROAS', 'value' => '2.1× → 4.6×',             'tone' => 'default'],
                ['caption' => 'TIMELINE',     'value' => '14 weeks',                'tone' => 'default'],
                ['caption' => 'SERVICES',     'value' => 'Paid · CRO · Lifecycle · Shopify', 'tone' => 'default'],
            ],
            'problem'  => 'D2C blended ROAS had collapsed to 2.1×. The wholesale storefront was running on a generic theme with no B2B portal, hand-keying orders into the warehouse. Email/SMS was at 8% of D2C revenue. Mobile PDP CVR sat at 0.6%.',
            'approach' => [
                'Shopify: rebuilt both D2C and wholesale storefronts on a shared theme + custom B2B portal with tiered pricing.',
                'Paid: rebuilt account architecture; shipped 18 net-new creatives in month one across Meta + Google.',
                'CRO: mobile PDP teardown, 8 ship-quality tests across PDP / cart / checkout.',
                'Lifecycle: full Klaviyo audit, 9 flows rebuilt with dynamic content blocks.',
            ],
            'result'   => 'Net B2B revenue +184% YoY. D2C blended ROAS 2.1× → 4.6× in one quarter. Email/SMS 8% → 31% of D2C revenue. Mobile PDP CVR +18%.',
            'stack'    => ['Shopify Plus', 'Klaviyo', 'Triple Whale', 'Meta', 'Google'],
        ],
        [
            'slug'          => 'flabelus',
            'industry'      => 'Footwear',
            'market'        => 'EU',
            'services'      => ['Paid', 'Creative', 'Shopify'],
            'tags'          => ['FOOTWEAR', 'HERITAGE'],
            'name'          => 'Flabelus',
            'hero_metric'   => '5.3×',
            'hero_tone'     => 'pop',
            'hero_label'    => 'BLENDED ROAS',
            'descriptor'    => 'Lifecycle and creative engine tipped 17% returning customer rate; 34% inside one season.',
            'subhead'       => 'Creative engine + lifecycle rebuild lifted blended ROAS from 2.3× to 5.3× and returning-customer rate to 34% in one season.',
            'metrics' => [
                ['caption' => 'BLENDED ROAS',      'value' => '5.3×',         'tone' => 'pop'],
                ['caption' => 'RETURNING CUSTOMERS','value' => '17% → 34%',   'tone' => 'default'],
                ['caption' => 'TIMELINE',          'value' => '12 weeks',     'tone' => 'default'],
                ['caption' => 'SERVICES',          'value' => 'Paid · Creative · Shopify', 'tone' => 'default'],
            ],
            'problem'  => 'Theme bloat had pushed LCP to 4.2s and Paid efficiency was collapsing. Creative refresh cadence was monthly, not weekly. Returning customer rate had stalled at 17%.',
            'approach' => [
                'Shopify: headless Hydrogen rebuild brought LCP from 4.2s to 1.5s.',
                'Creative: scripted UGC engine in three EU markets, 14 concepts / month.',
                'Paid: rebuilt structure, CAPI verified, weekly creative scoring.',
            ],
            'result'   => 'Blended ROAS 2.3× → 5.3×. LCP 4.2s → 1.5s. Returning customer rate 17% → 34% in one season. CAC down 28%.',
            'stack'    => ['Hydrogen', 'Shopify Plus', 'Meta', 'Google'],
        ],
        [
            'slug'          => 'banoffee-bcn',
            'industry'      => 'Beauty',
            'market'        => 'EU',
            'services'      => ['Paid', 'CRO', 'Lifecycle', 'AI'],
            'tags'          => ['BEAUTY', 'PERSONALIZATION'],
            'name'          => 'Banoffee BCN',
            'hero_metric'   => '€480k',
            'hero_tone'     => 'heat',
            'hero_label'    => 'ONLINE LAUNCH',
            'descriptor'    => 'Pre-launch ecommerce hit €480k online revenue in 7 months — Klaviyo, click & collect, Meta scale.',
            'subhead'       => 'From pre-ecommerce to €480k online revenue in 7 months — Klaviyo, click & collect, and Meta scale.',
            'metrics' => [
                ['caption' => 'ONLINE LAUNCH', 'value' => '€480k',    'tone' => 'heat'],
                ['caption' => 'AOV',            'value' => '€78',      'tone' => 'default'],
                ['caption' => 'TIMELINE',       'value' => '30 weeks', 'tone' => 'default'],
                ['caption' => 'SERVICES',       'value' => 'Paid · CRO · Lifecycle · AI', 'tone' => 'default'],
            ],
            'problem'  => 'Pre-ecommerce brand with a strong Barcelona retail story and zero online infrastructure. Founder needed Shopify, lifecycle, and paid live within a quarter.',
            'approach' => [
                'Shopify: theme + product personalization + click & collect config in week one.',
                'Lifecycle: 9 Klaviyo flows live before paid spend started.',
                'Paid: cold-start playbook across Meta + Google, ramped weekly.',
                'AI: PDP review summary + dynamic Klaviyo subject lines.',
            ],
            'result'   => '€480k in online revenue across the first 7 months. Email/SMS at 28% of revenue from day 30. Click & collect live in three Barcelona stores.',
            'stack'    => ['Shopify Plus', 'Klaviyo', 'Recharge', 'Meta', 'Google'],
        ],
    ],

    /* --------------------------------------------------------------------
     | Homepage FAQ
     * ----------------------------------------------------------------- */
    'home_faq' => [
        ['q' => 'What size brand do you work with?',                    'a' => "Mostly DTC brands doing \$500K to \$20M in annual online revenue. Below that, you don't have enough data for what we do. Above that, we can still help but you may want a multi-agency stack."],
        ['q' => 'Do you offer one-off projects or only retainers?',     'a' => 'Both. Two-week audits and 12-week CRO sprints are common entry points. Most engagements turn into ongoing retainers after the sprint.'],
        ['q' => "You're in Barcelona. Can you serve brands across the EU and LATAM?",     'a' => "Yes — it's the bulk of what we do. CET working hours overlap most of the EU comfortably, and we run an afternoon-late shift to overlap with LATAM markets. Everything is Slack-first. Weekly Looms work better than mismatched standups anyway."],
        ['q' => 'How fast can we see results?',                          'a' => 'Audit-and-plan deliverables in two weeks. Creative and media changes ship in week one of execution. Lifecycle revenue uplift is usually visible by week 4. Compounding CRO and SEO take 90 days.'],
        ['q' => 'Do you require long-term contracts?',                   'a' => "90-day initial term. Month-to-month after. If you want out, you give 30 days notice. We'd rather have brands stay because the numbers compound, not because of a contract."],
        ['q' => 'What platforms do you work with?',                      'a' => "Shopify and Shopify Plus on the storefront side. Klaviyo + Postscript on lifecycle. Meta, Google, TikTok, YouTube, Pinterest on paid. GA4 + Triple Whale + Looker on attribution. If you're on a different stack, talk to us."],
    ],

    /* --------------------------------------------------------------------
     | About
     * ----------------------------------------------------------------- */
    'about' => [
        'hero' => [
            'eyebrow'  => '/ ABOUT',
            'headline' => 'A real team. Senior operators. No theatre.',
            'sub'      => "We started ROAS/Driven because we were tired of agency theatre — the bloated retainers, the pyramid staffing, the quarterly readout deck that nobody read. We built the team we wished we'd hired.",
        ],
        'manifesto' => [
            ['title' => 'Senior operators only.',           'body' => 'No junior account managers. Every line of work is touched by someone who has done it for at least seven years.'],
            ['title' => 'Weekly numbers, quarterly roadmap.','body' => "Weekly Loom recap, monthly P&L call, quarterly roadmap review. If you don't see numbers every week, fire us."],
            ['title' => 'One P&L, not five vendors.',        'body' => 'We do paid, CRO, lifecycle, dev, creative, SEO, and AI under one roof. There is no "I\'ll ask the email team."'],
            ['title' => 'Boring weeks are forbidden.',       'body' => 'If a week is boring, something is broken. We tell you before you ask.'],
            ['title' => 'Numbers, not vibes.',               'body' => "We publish blended ROAS, CVR lift, email share of revenue. If we can't measure it, we don't sell it."],
        ],
        'not_for' => [
            'Pre-revenue brands.',
            'Brands looking for the cheapest media buyer.',
            'Six-month "strategy" engagements with no execution.',
            'Set-and-forget retainers.',
            "Decks that don't map to a P&L.",
        ],
        'team' => [
            [
                'name'      => 'Bosco',
                'role'      => 'Founder · CEO',
                'photo'     => 'team/bosco.png',
                'expertise' => 'Founded ROAS Driven and owns the firm’s strategic direction and senior client relationships. Sets the bar for operator-led engagements over agency theatre, with full P&L responsibility across the partnership book.',
            ],
            [
                'name'      => 'Lluis',
                'role'      => 'CCO · Senior Growth Manager',
                'photo'     => 'team/lluis.png',
                'expertise' => 'Owns the commercial practice and acts as the most senior strategist on retainer accounts. Builds cross-channel architecture, attribution frameworks, and engagement scopes from first principles.',
            ],
            [
                'name'      => 'Marina',
                'role'      => 'Growth Manager · Paid Media Strategist',
                'photo'     => 'team/marina.png',
                'expertise' => 'Hybrid operator running growth strategy alongside hands-on paid media execution. Specializes in Meta and Google performance creative, daily buying cadence, and full-funnel attribution across mid-market DTC brands.',
            ],
            [
                'name'      => 'Alejandra',
                'role'      => 'Growth Manager',
                'photo'     => 'team/alejandra.png',
                'expertise' => 'Account lead for a portfolio of partnership clients. Owns the weekly Loom cadence, monthly P&L reviews, and cross-discipline coordination between paid, lifecycle, and CRO.',
            ],
            [
                'name'      => 'Andrea',
                'role'      => 'Paid Media Strategist',
                'photo'     => 'team/andrea.png',
                'expertise' => 'Performance media operator. Builds account architecture across Meta, Google, and TikTok; briefs creative against the previous month’s winners; makes daily buying decisions off real signal.',
            ],
            [
                'name'      => 'Maria',
                'role'      => 'Paid Media Strategist',
                'photo'     => 'team/maria.png',
                'expertise' => 'Performance media operator. Focused on creative scoring loops, CAPI and Enhanced Conversions integrity, and scaling spend without ROAS collapse on Meta and Google.',
            ],
            [
                'name'      => 'Daniela',
                'role'      => 'Paid Media Strategist',
                'photo'     => 'team/daniela.png',
                'expertise' => 'Performance media operator. Owns TikTok and emerging-channel performance, weekly creative iteration cycles, and granular reporting on hold-rate, win-rate, and contribution margin.',
            ],
        ],
    ],

    /* --------------------------------------------------------------------
     | Journal (launch posts)
     * ----------------------------------------------------------------- */
    'journal' => [
        [
            'slug'      => 'mobile-pdp-cro-benchmarks-2026',
            'title'     => 'Mobile PDP CRO benchmarks 2026 — what we actually see across 14 DTC stores.',
            'category'  => 'CRO',
            'date'      => '2026-04-22',
            'read'      => '6 min read',
            'excerpt'   => "After 14 mobile PDP teardowns this quarter, here's what 'good' looks like — and where everyone is leaking.",
            'author'    => ['name' => '[Author Name]', 'role' => 'Senior CRO Strategist'],
        ],
        [
            'slug'      => 'klaviyo-flow-audit-checklist',
            'title'     => 'The 47-point Klaviyo audit we run on every new lifecycle engagement.',
            'category'  => 'Lifecycle',
            'date'      => '2026-04-08',
            'read'      => '9 min read',
            'excerpt'   => 'Every dead flow, every broken URL, every silent killer we hunt before rebuilding. Take the list and run it yourself.',
            'author'    => ['name' => '[Author Name]', 'role' => 'Senior Lifecycle Operator'],
        ],
        [
            'slug'      => 'meta-capi-for-shopify-mena',
            'title'     => 'Meta CAPI on Shopify in MENA — the working setup nobody publishes.',
            'category'  => 'Paid media',
            'date'      => '2026-03-25',
            'read'      => '7 min read',
            'excerpt'   => 'iOS attribution losses + GCC regulatory quirks make the default setup brittle. Here\'s what actually holds.',
            'author'    => ['name' => '[Author Name]', 'role' => 'Senior Paid Media Operator'],
        ],
    ],

    /* --------------------------------------------------------------------
     | Full client roster (rendered on /work)
     | Excludes internal stores (e.g. onecheckout / novasolution.ae).
     * ----------------------------------------------------------------- */
    'clients' => [
        'Fashion & Apparel' => [
            ['name' => 'Andreas BCN',           'domain' => 'andreasbcn.com'],
            ['name' => 'La Foresta',            'domain' => 'shoplaforesta.com'],
            ['name' => 'SSSTUFFF',              'domain' => 'ssstufff.com'],
            ['name' => 'Francesca Miranda',     'domain' => 'francescamiranda.com'],
            ['name' => 'Francesca Miranda CO',  'domain' => 'francescamiranda.com.co'],
            ['name' => 'Maison Alia',           'domain' => 'maisonalia.com'],
            ['name' => 'BAUDESSON',             'domain' => 'bybaudesson.com'],
            ['name' => 'Borgia Conti',          'domain' => 'borgiaconti.com'],
            ['name' => 'bimbymew',              'domain' => 'bimbymew.com'],
            ['name' => 'Maygel Coronel EUROPA', 'domain' => 'eu.maygelcoronel.com'],
            ['name' => 'Narah Soleigh',         'domain' => 'narahsoleigh.com'],
            ['name' => 'marÀvic Collection',    'domain' => 'maravic-collection.com'],
            ['name' => 'MOI&SASS',              'domain' => 'moiandsass.com'],
            ['name' => 'PAOLINA',               'domain' => 'paolina.be'],
            ['name' => 'CRIS SERRA',            'domain' => 'crisserra.com'],
            ['name' => 'The Brubaker',          'domain' => 'thebrubaker.com'],
            ['name' => 'edmmond',               'domain' => 'edmmond.com'],
            ['name' => 'HOMIESMARBELLA',        'domain' => 'homiesmarbella.com'],
            ['name' => 'Martín Alcalde',        'domain' => 'martinalcalde.studio'],
            ['name' => 'Mercules',              'domain' => 'mercules.es'],
            ['name' => 'Ganzitos',              'domain' => 'ganzitos.com'],
            ['name' => 'SAM NEWMAN CLOTHING',   'domain' => 'samnewmanclothing.com'],
            ['name' => 'BELAMER',               'domain' => 'belamer.co'],
            ['name' => 'LEBOR GABALA',          'domain' => 'leborgabala.com'],
            ['name' => 'Alliwant',              'domain' => 'alliwant.es'],
            ['name' => 'Hueqqo',                'domain' => 'hueqqo.com'],
            ['name' => 'Miboheme',              'domain' => 'miboheme.com'],
            ['name' => 'SIMONA STUDIO',         'domain' => 'simona-studio.com'],
            ['name' => 'Minerva Brand',         'domain' => 'minervabrandesp.com'],
            ['name' => 'LAIA ALEN',             'domain' => 'laiaalen.com'],
            ['name' => 'KAPSUL.',               'domain' => 'kap-sul.com'],
            ['name' => 'auka',                  'domain' => 'auka.es'],
            ['name' => 'Outsiders Division',    'domain' => 'outsidersdivision.com'],
            ['name' => 'AMORI MORI',            'domain' => 'amorimori.com'],
            ['name' => 'Magnolya Collection',   'domain' => 'magnolyacollection.com'],
            ['name' => 'Nina Blanc',            'domain' => 'ninablanc.com'],
            ['name' => 'Insomnia Studio',       'domain' => 'insomniastudio.eu'],
            ['name' => 'HEIMAT ATLANTICA',      'domain' => 'heimat-atlantica.com'],
            ['name' => 'Philippa1970',          'domain' => 'philippa1970.com'],
            ['name' => 'minteyesbrand',         'domain' => 'minteyesbrand.com'],
            ['name' => 'Blaine Box',            'domain' => 'blainebox.com'],
            ['name' => 'Jo-Sephine',            'domain' => 'jo-sephine.com'],
            ['name' => 'Mais X Frida',          'domain' => 'maisxfrida.com'],
            ['name' => 'Brava Fabrics',         'domain' => 'bravafabrics.com'],
            ['name' => 'Flabelus',              'domain' => 'flabelus.com'],
            ['name' => 'FILOCOLORE',            'domain' => 'filocolore.com'],
        ],
        'Activewear, Yoga & Cycling' => [
            ['name' => 'Pitaya',                'domain' => 'pitaya.yoga'],
            ['name' => 'Pamera',                'domain' => 'pameraclothingshop.com'],
            ['name' => 'unfeigned',             'domain' => 'unfeignedgear.com'],
        ],
        'Jewelry' => [
            ['name' => 'Yolié',                 'domain' => 'yoliejewelry.com'],
            ['name' => 'WeThem Brand',          'domain' => 'wethembrand.com'],
            ['name' => 'Laurence Coste',        'domain' => 'laurence-coste.com'],
            ['name' => 'Moliane',               'domain' => 'moliane-studio.com'],
            ['name' => 'BRUNA',                 'domain' => 'brunathelabel.com'],
            ['name' => 'Antiqua',               'domain' => 'antiqua.store'],
            ['name' => 'MEW',                   'domain' => 'mew-jewellery.com'],
            ['name' => 'Alhaja Cult Store',     'domain' => 'alhajastore.com'],
        ],
        'Footwear' => [
            ['name' => 'MIM Shoes',             'domain' => 'mimshoes.com'],
            ['name' => 'KOOPS',                 'domain' => 'koopsbrand.com'],
            ['name' => 'Micuir',                'domain' => 'micuir.com'],
            ['name' => 'Tropicfeel',            'domain' => 'shop.tropicfeel.com'],
            ['name' => 'Muk Barcelona',         'domain' => 'mukbarcelona.com'],
            ['name' => 'Feners',                'domain' => 'feners.com'],
        ],
        'Bags & Accessories' => [
            ['name' => 'Ölend',                 'domain' => 'olend.net'],
            ['name' => 'Ölend Wholesale',       'domain' => 'olendwholesale.com'],
            ['name' => 'ZUBI',                  'domain' => 'zubidesign.com'],
        ],
        'Beauty, Wellness & Fragrance' => [
            ['name' => 'facegloss',             'domain' => 'facegloss.eu'],
            ['name' => 'Musc Intime Espagne',   'domain' => 'muscintime.es'],
            ['name' => 'Método R',              'domain' => 'metodo-r.com'],
            ['name' => 'Superlativa',           'domain' => 'superlativabotanicals.com'],
            ['name' => 'Banoffeebcn',           'domain' => 'banoffeebcn.com'],
            ['name' => 'The Organic Republic',  'domain' => 'theorganicrepublic.com'],
            ['name' => 'Myalma',                'domain' => 'myalma.es'],
        ],
        'Home, Decor & Lighting' => [
            ['name' => 'Parachilna',            'domain' => 'parachilna.eu'],
            ['name' => 'Rosemary Home',         'domain' => 'rosemaryhome.com'],
            ['name' => 'CASONÁ',                'domain' => 'shopcasona.com'],
            ['name' => 'Belari',                'domain' => 'belaridesign.com'],
            ['name' => 'Marlot Baus',           'domain' => 'marlotbaus.com'],
        ],
        'Kids, Lingerie & Specialty' => [
            ['name' => 'The Animals Observatory', 'domain' => 'theanimalsobservatory.com'],
            ['name' => 'ENTOS',                 'domain' => 'entoslingerie.com'],
            ['name' => 'Carmen Fitz',           'domain' => 'carmen-fitz.myshopify.com'],
            ['name' => 'G19 Pharmacy',          'domain' => 'g19pharmacy.com'],
        ],
    ],

    /* --------------------------------------------------------------------
     | Footer
     * ----------------------------------------------------------------- */
    'footer' => [
        'address' => 'Barcelona · Spain',
        'email'   => 'hello@roasdriven.io',
        'social'  => [
            ['label' => 'LinkedIn', 'url' => 'https://linkedin.com/company/roasdriven'],
            ['label' => 'X',         'url' => 'https://x.com/roasdriven'],
        ],
        'legal' => [
            ['label' => 'Privacy', 'route' => 'legal.privacy'],
            ['label' => 'Terms',   'route' => 'legal.terms'],
            ['label' => 'Cookies', 'route' => 'legal.cookies'],
        ],
    ],
];
