<!DOCTYPE html>
<html lang="en" class="bg-ink">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#0A0A0A">

    <title>@yield('title', 'ROAS/Driven — Ecommerce that prints revenue, not promises.')</title>
    <meta name="description" content="@yield('description', 'The senior growth team behind Ölend, Flabelus, Banoffee BCN and other ambitious Spanish brands. Paid, CRO, lifecycle, Shopify, creative — under one P&L. Barcelona-built, EU + LATAM.')">

    {{-- Favicon (SVG with light/dark slash) --}}
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="apple-touch-icon" href="{{ asset('logo-monogram.svg') }}">

    {{-- Open Graph --}}
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="ROAS/Driven">
    <meta property="og:title" content="@yield('title', 'ROAS/Driven')">
    <meta property="og:description" content="@yield('description', 'Senior growth team for DTC brands. Dubai-built, globally trusted.')">

    {{-- Schema.org Organization --}}
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "ROAS/Driven",
      "url": "https://roasdriven.io",
      "logo": "https://roasdriven.io/og-default.png",
      "address": { "@type": "PostalAddress", "addressLocality": "Dubai", "addressCountry": "AE" },
      "sameAs": [
        "https://linkedin.com/company/roasdriven",
        "https://x.com/roasdriven"
      ]
    }
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-ink text-white antialiased">

<a href="#main" class="skip-link">Skip to content</a>

@include('partials.nav')

<main id="main">
    @yield('content')
</main>

@include('partials.footer')

</body>
</html>
