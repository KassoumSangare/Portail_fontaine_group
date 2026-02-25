<header id="site-header">

    <div class="header-left">
        <div class="header-ticker" aria-hidden="true">
            <div class="header-ticker-track" id="header-ticker-track">
                {{-- Rempli dynamiquement par JS --}}
            </div>
        </div>
    </div>

    <div class="header-right">
        <button class="btn-info-header" id="btn-info" aria-haspopup="dialog">Info</button>

        <button class="theme-toggle" id="theme-toggle" aria-label="Changer de thème">
            <svg class="icon-moon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
            </svg>
            <svg class="icon-sun" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <circle cx="12" cy="12" r="5"></circle>
                <line x1="12" y1="1" x2="12" y2="3"></line>
                <line x1="12" y1="21" x2="12" y2="23"></line>
                <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                <line x1="1" y1="12" x2="3" y2="12"></line>
                <line x1="21" y1="12" x2="23" y2="12"></line>
                <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
            </svg>
        </button>

        <button class="mobile-menu-toggle" id="mobile-menu-toggle" aria-label="Ouvrir le menu" aria-expanded="false" aria-controls="mobile-menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>

</header>

<nav id="static-nav" aria-label="Navigation principale">
    <div class="static-nav-logo">
        <a class="logo-wrap" href="{{ url('/') }}" aria-label="Fontaine Group Holding — Accueil">
            <img class="logo-img" src="{{ asset('assets/images/logo_fontaine_group.jpeg') }}" alt="Fontaine Group Holding" width="34" height="34" loading="eager" fetchpriority="high" />
            <span class="logo-tagline">Côte d'Ivoire</span>
        </a>
    </div>

    <div class="static-nav-center">
        <button class="nav-menu-item" data-modal="modal-about">À Propos</button>
        <div class="nav-sep" aria-hidden="true"></div>

        <div class="mega-wrapper" id="mega-wrapper">
            <button class="nav-menu-item has-mega" id="mega-trigger" data-modal="modal-services" aria-haspopup="true" aria-expanded="false" aria-controls="mega-dropdown">
                Nos Services
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
            </button>

            <div class="mega-dropdown" id="mega-dropdown" role="region" aria-label="Sites du groupe">
                <div class="mega-grid" id="mega-grid">
                    {{-- Rempli dynamiquement  --}}
                    <div class="services-grid">

                        <div class="service-card">
                            <div class="service-icon" aria-hidden="true">◈</div>
                            <h3 class="service-name">Capital Privé</h3>
                            <p class="service-desc">Investissement direct dans des entreprises non cotées à potentiel de croissance exceptionnel.</p>
                        </div>

                        <div class="service-card">
                            <div class="service-icon" aria-hidden="true">◇</div>
                            <h3 class="service-name">Gestion Patrimoniale</h3>
                            <p class="service-desc">Structuration et protection d'actifs pour grandes fortunes et familles entrepreneurs.</p>
                        </div>

                        <div class="service-card">
                            <div class="service-icon" aria-hidden="true">△</div>
                            <h3 class="service-name">Advisory M&amp;A</h3>
                            <p class="service-desc">Accompagnement dans les opérations de fusion, acquisition et restructuration stratégique.</p>
                        </div>

                        <div class="service-card">
                            <div class="service-icon" aria-hidden="true">○</div>
                            <h3 class="service-name">Expansion Internationale</h3>
                            <p class="service-desc">Déploiement transfrontalier avec ancrage local et conformité réglementaire multi-juridictionnelle.</p>
                        </div>

                    </div>
                    <div class="services-grid">

                        <div class="service-card">
                            <div class="service-icon" aria-hidden="true">◈</div>
                            <h3 class="service-name">Capital Privé</h3>
                            <p class="service-desc">Investissement direct dans des entreprises non cotées à potentiel de croissance exceptionnel.</p>
                        </div>

                        <div class="service-card">
                            <div class="service-icon" aria-hidden="true">◇</div>
                            <h3 class="service-name">Gestion Patrimoniale</h3>
                            <p class="service-desc">Structuration et protection d'actifs pour grandes fortunes et familles entrepreneurs.</p>
                        </div>

                        <div class="service-card">
                            <div class="service-icon" aria-hidden="true">△</div>
                            <h3 class="service-name">Advisory M&amp;A</h3>
                            <p class="service-desc">Accompagnement dans les opérations de fusion, acquisition et restructuration stratégique.</p>
                        </div>

                        <div class="service-card">
                            <div class="service-icon" aria-hidden="true">○</div>
                            <h3 class="service-name">Expansion Internationale</h3>
                            <p class="service-desc">Déploiement transfrontalier avec ancrage local et conformité réglementaire multi-juridictionnelle.</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="nav-sep" aria-hidden="true"></div>
        <button class="nav-menu-item" data-modal="modal-auth" data-tab="login">Espace Client</button>
        <div class="nav-sep" aria-hidden="true"></div>
        <button class="nav-menu-item" data-modal="modal-auth" data-tab="register">S'inscrire</button>
    </div>

    <div class="static-nav-spacer" aria-hidden="true"></div>
</nav>

<div class="mobile-menu" id="mobile-menu" role="dialog" aria-modal="true" aria-label="Menu mobile">
    <button class="mobile-close" id="mobile-close" aria-label="Fermer le menu">✕</button>
    <nav class="mobile-nav" aria-label="Navigation mobile">
        <button data-modal="modal-about">À Propos</button>
        <div class="mobile-sep" aria-hidden="true"></div>
        <button id="mobile-sites-btn">Nos Services</button>
        <div class="mobile-sep" aria-hidden="true"></div>
        <button data-modal="modal-auth" data-tab="login">Espace Client</button>
        <div class="mobile-sep" aria-hidden="true"></div>
        <button data-modal="modal-auth" data-tab="register">S'inscrire</button>
    </nav>
</div>