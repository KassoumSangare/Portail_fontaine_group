<!DOCTYPE html>
<html lang="fr">
{{-- [FIX] data-theme retiré ici — le script inline ci-dessous
     l'applique avant tout rendu, évitant le FOUC sans valeur hardcodée --}}

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="@yield('meta_description', 'Fontaine Group Holding — Groupe d\'investissement stratégique basé en Côte d\'Ivoire.')" />

    {{-- Open Graph --}}
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:title" content="@yield('og_title', 'Fontaine Group Holding')" />
    <meta property="og:description" content="@yield('og_description', 'Architecture financière, capital privé et expansion internationale depuis Abidjan.')" />
    <meta property="og:image" content="{{ asset('assets/images/logo_fontaine_group.jpeg') }}" />

    {{-- Theme color (mobiles) --}}
    <meta name="theme-color" content="#07101e" />

    {{-- ── Anti-FOUC : thème appliqué AVANT tout rendu ──
         Doit rester inline et en tout premier script       --}}
    <script>
        (function() {
            try {
                var saved = localStorage.getItem('fgh_theme');
                var prefersLight = window.matchMedia('(prefers-color-scheme: light)').matches;
                document.documentElement.setAttribute(
                    'data-theme',
                    saved || (prefersLight ? 'light' : 'dark')
                );
            } catch (e) {
                document.documentElement.setAttribute('data-theme', 'dark');
            }
        })();
    </script>

    <title>@yield('title', 'Fontaine Group Holding — Côte d\'Ivoire')</title>

    {{-- [FIX] Favicon --}}
    <link rel="icon" type="image/jpeg" href="{{ asset('assets/images/logo_fontaine_group.jpeg') }}" />
    <link rel="apple-touch-icon" href="{{ asset('assets/images/logo_fontaine_group.jpeg') }}" />

    {{-- Preconnects --}}
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="preconnect" href="https://cdn.jsdelivr.net" />

    {{-- Google Fonts — chargement non bloquant --}}
    <link rel="preload" as="style"
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Montserrat:wght@300;400;500;600;700&display=swap" />
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Montserrat:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"
        media="print"
        onload="this.media='all'" />
    {{-- [FIX] noscript fallback manquant pour Google Fonts --}}
    <noscript>
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Montserrat:wght@300;400;500;600;700&display=swap" />
    </noscript>

    {{-- Bootstrap Icons — chargement non bloquant --}}
    <link rel="preload" as="style"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
        media="print"
        onload="this.media='all'" />
    <noscript>
        <link rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
    </noscript>

    {{-- Styles principaux --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    {{-- [FIX] animations.css chargé ici (retiré du @import dans style.css) --}}
    <link rel="stylesheet" href="{{ asset('assets/css/animations.css') }}" />

    @stack('styles')
</head>

<body>

    {{-- ═══ HEADER + NAV ═══ --}}
    @include('frontend.partials.header')

    {{-- ═══ CONTENU PRINCIPAL ═══ --}}
    <main id="site-main">
        @yield('content')
    </main>

    {{-- ═══ FOOTER ═══ --}}
    @include('frontend.partials.footer')

    {{-- ═══ SCRIPT PRINCIPAL — defer (non bloquant) ═══ --}}
    <script src="{{ asset('assets/js/app.js') }}" defer></script>

    @stack('scripts')

</body>

</html>