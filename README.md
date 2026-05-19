# roas

Laravel 11 + Blade + Tailwind marketing site for **ROAS/Driven** (`roasdriven.io`).

Built from the specs at `../docs/`. Copy is paste-ready, design tokens match the brand system, every route from the IA is live.

## Stack

- **Laravel 11** (PHP 8.2+)
- **Blade** templates (server-rendered, no JS framework)
- **Tailwind CSS 3** + CSS variables for design tokens
- **Vite** for asset bundling
- Vanilla JS for nav scroll behavior, mobile overlay, FAQ accordion, and count-up animation
- No database required at v1 — all content lives in `config/content.php`

## Routes

| Method | Path | Name |
| --- | --- | --- |
| GET | `/` | `home` |
| GET | `/services` | `services.index` |
| GET | `/services/{slug}` | `services.show` |
| GET | `/work` | `work.index` |
| GET | `/work/{slug}` | `work.show` |
| GET | `/about` | `about` |
| GET | `/pricing` | `pricing` |
| GET | `/journal` | `journal.index` |
| GET | `/journal/{slug}` | `journal.show` |
| GET | `/book` | `book` |
| POST | `/book` | `book.store` |
| GET | `/legal/privacy` | `legal.privacy` |
| GET | `/legal/terms` | `legal.terms` |
| GET | `/legal/cookies` | `legal.cookies` |

Service slugs: `paid-media`, `cro-and-ux`, `lifecycle-email-sms`, `shopify-development`, `creative-and-content`, `seo`, `ai-optimization`.

Case slugs (placeholders): `brand-a`, `brand-b`, `brand-c`.

## Setup

```bash
# 1. PHP / Composer dependencies
composer install

# 2. JS / Vite dependencies
npm install

# 3. Environment
cp .env.example .env
php artisan key:generate

# 4. Build assets (dev or prod)
npm run dev        # watch + hot reload
# or
npm run build      # production build

# 5. Serve
php artisan serve  # http://localhost:8000
```

> **No database required.** All content lives in `config/content.php`. The default `.env` uses SQLite + file sessions for zero setup.

## Editing content

Every string on the site comes from `config/content.php`. Open it and search for the section you want to edit — homepage, services, cases, pricing, FAQ, journal, footer, etc.

Placeholder format (so `grep` finds them before launch):

- `[$XXM]` — currency totals
- `[4.Xx]` — multipliers
- `[XX]%` — percentages
- `[Brand A/B/C]` — named brands
- `[X],XXX` — numbers

## /book form

The form is in `app/Http/Controllers/BookController.php`. On submit:

1. Validates 7 fields max (per CRO spec).
2. Logs the brief to the configured log channel.
3. Sends an email to `CONTACT_EMAIL` (set in `.env`).
4. Redirects back to `/book` with a confirmation state.

In dev, `MAIL_MAILER=log` means submissions land in `storage/logs/laravel.log`. To send real email, configure Resend / SMTP / Mailgun in `.env`.

## Design tokens

Defined in `resources/css/app.css` as CSS variables, mapped to Tailwind in `tailwind.config.js`.

| Token | Use |
| --- | --- |
| `--ink` `#0A0A0A` | Page background |
| `--surface` `#141414` | Cards |
| `--surface-2` `#1F1F1F` | Elevated cards |
| `--lift` `#DDF247` | Primary accent / CTAs / the slash |
| `--pop` `#FF3D8E` | Metric pop / secondary CTA |
| `--heat` `#FFC93D` | Tags / badges |
| `--paper` `#F5F1E8` | Editorial break section only |
| `--mute` `#9CA3AF` | Captions |
| `--rule` `#262626` | Hairlines |

Typography:

- **Display:** General Sans (loaded via Fontshare).
- **Body:** Inter.
- **Mono:** JetBrains Mono.

## File layout

```
roas/
├── app/
│   ├── Http/Controllers/      # one controller per page surface
│   └── Providers/
├── bootstrap/                 # Laravel 11 bootstrap (no Kernel.php)
├── config/
│   └── content.php            # all site copy lives here
├── public/                    # web root
├── resources/
│   ├── css/app.css            # tokens + Tailwind
│   ├── js/app.js              # nav, mobile, FAQ, count-up
│   └── views/
│       ├── layouts/app.blade.php
│       ├── partials/          # nav, footer, CTAs, cards
│       ├── services/{index,show}.blade.php
│       ├── work/{index,show}.blade.php
│       ├── journal/{index,show}.blade.php
│       ├── legal/{privacy,terms,cookies}.blade.php
│       ├── errors/{404,500}.blade.php
│       ├── home.blade.php
│       ├── about.blade.php
│       ├── pricing.blade.php
│       └── book.blade.php
├── routes/web.php
└── tailwind.config.js
```

## Before production launch

See `../docs/07-launch/01-launch-checklist.md` for the full pre-flight. Highlights:

- Replace every `[placeholder]` in `config/content.php`.
- Real founder + team photos and bios.
- Real case studies (replace `brand-a/b/c` placeholders).
- Confirm partner badges (Shopify Plus, Klaviyo, Meta, Google) before shipping them as "confirmed".
- Lawyer-reviewed `/legal/*` content (GDPR + UAE PDPL).
- Set up real mailer (Resend / Mailgun / SES).
- Lighthouse: LCP < 1.8s, INP < 200ms, CLS < 0.05, Perf ≥ 95, A11y ≥ 98, SEO = 100.

## License

Proprietary — internal Nova Solution project.
