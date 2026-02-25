<!DOCTYPE html>
<html lang="fr" data-theme="dark">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Fontaine Group Holding — Groupe d'investissement stratégique basé en Côte d'Ivoire." />
    <meta property="og:title" content="Fontaine Group Holding" />
    <meta property="og:description" content="Architecture financière, capital privé et expansion internationale depuis Abidjan." />
    <meta property="og:image" content="{{ asset('assets/images/logo_fontaine_group.jpeg') }}" />
    <meta name="theme-color" content="#07101e" />

    {{-- Anti-FOUC : applique le thème avant le rendu --}}
    <script>
        (function() {
            try {
                const savedTheme = localStorage.getItem('fgh_theme');
                const prefersLight = window.matchMedia('(prefers-color-scheme: light)').matches;
                document.documentElement.setAttribute('data-theme', savedTheme || (prefersLight ? 'light' : 'dark'));
            } catch (e) {
                document.documentElement.setAttribute('data-theme', 'dark');
            }
        })();
    </script>

    <title>@yield('title', 'Fontaine Group Holding — Côte d\'Ivoire')</title>

    {{-- Preconnect pour polices et icônes --}}
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="preconnect" href="https://cdn.jsdelivr.net" />

    {{-- Google Fonts avec display=swap --}}
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet" media="print" onload="this.media='all'" />

    {{-- Bootstrap Icons avec fallback --}}
    <link rel="preload" as="style" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" media="print" onload="this.media='all'" />
    <noscript>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
    </noscript>

    {{-- Styles principaux --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/animations.css') }}" />
</head>

<body>

    {{-- ═══ HEADER + NAV (mega menu, search, theme toggle) ═══ --}}
    @include('frontend.partials.header')

    {{-- ═══ CONTENU PRINCIPAL ═══ --}}
    <main id="site-main">
        @yield('content')
    </main>

    {{-- ═══ FOOTER ═══ --}}
    @include('frontend.partials.footer')

    {{-- ═══ SCRIPT PRINCIPAL — defer pour non-bloquant ═══ --}}
    <script src="{{ asset('assets/js/app.js') }}" defer></script>

    @stack('scripts')
</body>

</html>