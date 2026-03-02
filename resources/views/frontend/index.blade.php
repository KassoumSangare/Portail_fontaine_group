@extends('frontend.partials.base')

@section('title', 'Fontaine Group Holding — Investissement Stratégique · Côte d\'Ivoire')

@section('content')

{{-- ══════════════════════════════════════════════
     VIDÉO — Présentation institutionnelle
══════════════════════════════════════════════ --}}
<section class="video-section" aria-label="Vidéo de présentation institutionnelle">
  <div class="video-container">
    <p class="video-label">Présentation institutionnelle</p>
    <div class="video-wrapper">
      {{-- [FIX] Retrait de width="560" height="315" — le CSS gère le ratio 16/9 --}}
      <iframe
        src="https://www.youtube.com/embed/BljbxkuUjlE?si=waQMgE4LqS98SZjn&autoplay=1&mute=1&loop=1&playlist=BljbxkuUjlE"
        title="Fontaine Group Holding — Présentation institutionnelle"
        frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        referrerpolicy="strict-origin-when-cross-origin"
        allowfullscreen>
      </iframe>
    </div>
  </div>
</section>

{{-- ══════════════════════════════════════════════
     À PROPOS
══════════════════════════════════════════════ --}}
<section class="about-section" itemscope itemtype="https://schema.org/AboutPage">

  <p class="about-eyebrow" itemprop="name">À Propos</p>

  <h1 class="about-title" itemprop="headline">
    Fondé à Abidjan, <em>Fontaine Group Holding</em>
  </h1>

  <div class="about-divider" aria-hidden="true"></div>

  {{-- [FIX] <div> avec <p> enfants — marges gérées via .about-sub p en CSS --}}
  <div class="about-sub" itemprop="description">
    <p>
      est un véhicule d'investissement multi-stratégies spécialisé dans l'allocation
      de capital à haute valeur ajoutée. Nous accompagnons des entreprises à fort potentiel,
      des familles patrimoniales et des institutionnels dans la structuration, la croissance
      et la pérennisation de leurs actifs.
    </p>
    <p>
      Notre philosophie repose sur trois piliers : la <strong>rigueur analytique</strong>,
      la <strong>vision long terme</strong> et l'<strong>intégrité absolue</strong>.
      Présents sur les marchés africains, européens et moyen-orientaux, nous conjuguons
      expertise locale et standards internationaux.
    </p>
  </div>

</section>

{{-- ══════════════════════════════════════════════
     STATS BAR — [FIX] section manquante ajoutée
══════════════════════════════════════════════ --}}
<!-- <div class="stats-bar" role="list" aria-label="Chiffres clés">
  <div class="stat-item" role="listitem">
    <div class="stat-num">20+</div>
    <div class="stat-label">Années d'expertise</div>
  </div>
  <div class="stat-item" role="listitem">
    <div class="stat-num">12</div>
    <div class="stat-label">Pays de présence</div>
  </div>
  <div class="stat-item" role="listitem">
    <div class="stat-num">€2.4Mrd</div>
    <div class="stat-label">Actifs sous gestion</div>
  </div>
  <div class="stat-item" role="listitem">
    <div class="stat-num">340+</div>
    <div class="stat-label">Clients partenaires</div>
  </div>
</div> -->

{{-- ══════════════════════════════════════════════
     CTA
══════════════════════════════════════════════ --}}
<section class="cta-section">
  <p class="cta-label">Rejoindre le groupe</p>
  <h2 class="cta-title">Prêt à bâtir votre<br /><em>avenir financier</em>&nbsp;?</h2>
  <p class="cta-sub">Nos équipes sont disponibles pour vous accompagner à chaque étape.</p>
  <div class="cta-buttons">
    <button class="btn-primary-gold"
      id="cta-services"
      aria-label="Découvrir nos services"
      data-modal="modal-services">
      Découvrir nos services
    </button>
    <button class="btn-outline-accent"
      id="cta-client"
      aria-label="Accéder à l'espace client"
      data-modal="modal-auth"
      data-tab="login">
      Espace client
    </button>
  </div>
</section>

{{-- ══════════════════════════════════════════════
     WHATSAPP FAB
══════════════════════════════════════════════ --}}
<a class="whatsapp-fab"
  href="https://wa.me/2250000000000"
  target="_blank"
  rel="noopener noreferrer"
  title="Écrire sur WhatsApp"
  aria-label="Nous écrire sur WhatsApp (nouvelle fenêtre)">
  <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
    aria-hidden="true" width="28" height="28">
    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
  </svg>
</a>

{{-- ══════════════════════════════════════════════
     COMPTEUR DE VUES
══════════════════════════════════════════════ --}}
<div id="view-counter"
  aria-label="Nombre de visites sur cette page"
  title="Vues de la page">
  <span class="vc-eye" aria-hidden="true">
    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
      width="14" height="14">
      <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
      <circle cx="12" cy="12" r="3" />
    </svg>
  </span>
  <span id="vc-num" aria-live="polite">0</span>
  <span class="vc-label">vues</span>
</div>

{{-- ══════════════════════════════════════════════
     SEARCH OVERLAY (Ctrl+K)
══════════════════════════════════════════════ --}}
<div class="search-overlay" id="search-overlay" role="dialog" aria-modal="true" aria-label="Recherche">
  <div class="search-container">
    <div class="search-header">
      <input type="search"
        id="search-input"
        placeholder="Rechercher un service, une entité…"
        autocomplete="off"
        aria-label="Champ de recherche" />
      <kbd class="search-kbd-hint">ESC</kbd>
      <button class="search-close" id="search-close-btn" aria-label="Fermer la recherche">✕</button>
    </div>
    <div class="search-results" id="search-results" role="list" aria-live="polite"></div>
  </div>
</div>


{{-- ══════════════════════════════════════════════
     MODALS
══════════════════════════════════════════════ --}}

{{-- modal-about --}}
<div class="modal-overlay" id="modal-about"
  role="dialog" aria-modal="true"
  aria-labelledby="modal-about-title">
  <div class="modal-box">
    <button class="modal-close" data-close="modal-about" aria-label="Fermer">✕</button>
    <p class="modal-tag">Notre identité</p>
    <h2 class="modal-title" id="modal-about-title">À Propos</h2>
    <div class="modal-rule" aria-hidden="true"></div>
    <div class="modal-body-text">
      <p>Fondé à Abidjan, <strong class="modal-highlight">Fontaine Group Holding</strong>
        est un véhicule d'investissement multi-stratégies spécialisé dans l'allocation
        de capital à haute valeur ajoutée. Nous accompagnons des entreprises à fort potentiel,
        des familles patrimoniales et des institutionnels dans la structuration, la croissance
        et la pérennisation de leurs actifs.</p>
      <p class="modal-mt">Notre philosophie repose sur trois piliers :
        la <em class="modal-em">rigueur analytique</em>,
        la <em class="modal-em">vision long terme</em>
        et l'<em class="modal-em">intégrité absolue</em>.
        Présents sur les marchés africains, européens et moyen-orientaux,
        nous conjuguons expertise locale et standards internationaux.</p>
    </div>
  </div>
</div>

{{-- modal-services — [FIX] contenu complet (pas "...") --}}
<div class="modal-overlay" id="modal-services"
  role="dialog" aria-modal="true"
  aria-labelledby="modal-services-title">
  <div class="modal-box">
    <button class="modal-close" data-close="modal-services" aria-label="Fermer">✕</button>
    <p class="modal-tag">Nos offres</p>
    <h2 class="modal-title" id="modal-services-title">Nos Services</h2>
    <div class="modal-rule" aria-hidden="true"></div>
    <div class="services-grid">
      <div class="service-card">
        <div class="service-icon" aria-hidden="true">◈</div>
        <p class="service-name">Capital Privé</p>
        <p class="service-desc">Investissement direct dans des entreprises non cotées à potentiel de croissance exceptionnel.</p>
      </div>
      <div class="service-card">
        <div class="service-icon" aria-hidden="true">◇</div>
        <p class="service-name">Gestion Patrimoniale</p>
        <p class="service-desc">Structuration et protection d'actifs pour grandes fortunes et familles entrepreneurs.</p>
      </div>
      <div class="service-card">
        <div class="service-icon" aria-hidden="true">△</div>
        <p class="service-name">Advisory M&amp;A</p>
        <p class="service-desc">Accompagnement dans les opérations de fusion, acquisition et restructuration stratégique.</p>
      </div>
      <div class="service-card">
        <div class="service-icon" aria-hidden="true">○</div>
        <p class="service-name">Expansion Internationale</p>
        <p class="service-desc">Déploiement transfrontalier avec ancrage local et conformité réglementaire multi-juridictionnelle.</p>
      </div>
    </div>
  </div>
</div>

{{-- modal-auth — [FIX] IDs tab-login / tab-register ajoutés --}}
<div class="modal-overlay" id="modal-auth"
  role="dialog" aria-modal="true"
  aria-labelledby="modal-auth-title">
  <div class="modal-box">
    <button class="modal-close" data-close="modal-auth" aria-label="Fermer">✕</button>
    <p class="modal-tag">Espace client</p>
    <h2 class="modal-title" id="modal-auth-title">Accès Sécurisé</h2>
    <div class="modal-rule" aria-hidden="true"></div>

    <div class="auth-tabs" role="tablist">
      {{-- [FIX] id="tab-login" et id="tab-register" manquants --}}
      <button class="auth-tab active"
        id="tab-login"
        data-tab="login"
        role="tab"
        aria-selected="true"
        aria-controls="form-login">
        Connexion
      </button>
      <button class="auth-tab"
        id="tab-register"
        data-tab="register"
        role="tab"
        aria-selected="false"
        aria-controls="form-register">
        Inscription
      </button>
    </div>

    {{-- [FIX] aria-labelledby corrigés --}}
    <div class="auth-form active"
      id="form-login"
      role="tabpanel"
      aria-labelledby="tab-login">
      <div class="form-group">
        <label for="login-email">Adresse e-mail</label>
        <input id="login-email" type="email" placeholder="votre@email.com" autocomplete="email" />
      </div>
      <div class="form-group">
        <label for="login-password">Mot de passe</label>
        <input id="login-password" type="password" placeholder="••••••••" autocomplete="current-password" />
      </div>
      <button class="btn-submit" type="submit">Se connecter</button>
      <p class="auth-note">
        Mot de passe oublié ?
        <a href="#" class="auth-link">Réinitialiser</a>
      </p>
    </div>

    <div class="auth-form"
      id="form-register"
      role="tabpanel"
      aria-labelledby="tab-register">
      <div class="form-group">
        <label for="reg-name">Prénom &amp; Nom</label>
        <input id="reg-name" type="text" placeholder="Jean Dupont" autocomplete="name" />
      </div>
      <div class="form-group">
        <label for="reg-email">Adresse e-mail</label>
        <input id="reg-email" type="email" placeholder="votre@email.com" autocomplete="email" />
      </div>
      <div class="form-group">
        <label for="reg-password">Mot de passe</label>
        <input id="reg-password" type="password" placeholder="Minimum 8 caractères" autocomplete="new-password" />
      </div>
      <button class="btn-submit" type="submit">Créer un compte</button>
      <p class="auth-note">
        En vous inscrivant, vous acceptez nos
        <a href="#" class="auth-link">Conditions d'utilisation</a>
      </p>
    </div>

  </div>
</div>

{{-- modal-info --}}
<div class="modal-overlay" id="modal-info"
  role="dialog" aria-modal="true"
  aria-labelledby="modal-info-title">
  <div class="modal-box">
    <button class="modal-close" data-close="modal-info" aria-label="Fermer">✕</button>
    <p class="modal-tag">Documentation</p>
    <h2 class="modal-title" id="modal-info-title">Contact &amp; Info</h2>
    <div class="modal-rule" aria-hidden="true"></div>
    <p class="modal-body-text">Pour toute demande de partenariat, d'information ou d'accès investisseur, contactez nos équipes.</p>
    <div class="contact-grid">
      <address class="contact-item">
        <p class="ci-label">Siège · Abidjan</p>
        <p class="ci-value">Plateau, Avenue Botreau-Roussel<br />Abidjan, Côte d'Ivoire</p>
      </address>
      <address class="contact-item">
        <p class="ci-label">Bureau Europe</p>
        <p class="ci-value">Route de Florissant 12<br />1206 Genève, Suisse</p>
      </address>
      <div class="contact-item">
        <p class="ci-label">Email général</p>
        <p class="ci-value">
          <a class="contact-link" href="mailto:contact@fontainegroup.ci">contact@fontainegroup.ci</a>
        </p>
      </div>
      <div class="contact-item">
        <p class="ci-label">Relations investisseurs</p>
        <p class="ci-value">
          <a class="contact-link" href="mailto:ir@fontainegroup.ci">ir@fontainegroup.ci</a>
        </p>
      </div>
    </div>
  </div>
</div>

@endsection