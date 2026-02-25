{{-- ═══════════════════════════════════════════
   FONTAINE GROUP HOLDING — index.blade.php v2.3
   Vue principale · Version optimisée performance
   ─────────────────────────────────────────────
   Optimisations :
   · Vidéo en autoplay avec paramètres YouTube
   · iframe avec loading="eager" (car visible)
   · Images optimisées avec loading="lazy" / "eager"
   · SVG inline avec cache busting
   · Délégation d'événements
   · Micro-données Schema.org
═══════════════════════════════════════════ --}}

@extends('frontend.partials.base')

@section('content')
{{-- ══════════════════════════════════════════════
     VIDÉO — Présentation institutionnelle en AUTOPLAY
══════════════════════════════════════════════ --}}
<section class="video-section" aria-label="Vidéo de présentation institutionnelle">
  <div class="video-container">

    <p class="video-label">Présentation institutionnelle</p>

    <div class="video-wrapper">
      <iframe
        width="560"
        height="315"
        src="https://www.youtube.com/embed/vpefyh8UgLI?autoplay=1&mute=1&loop=1&playlist=vpefyh8UgLI&controls=1&rel=0&modestbranding=1&enablejsapi=0"
        title="Fontaine Group Holding — Présentation institutionnelle"
        loading="eager"
        importance="high"
        frameborder="0"
        referrerpolicy="strict-origin-when-cross-origin"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        allowfullscreen
        aria-label="Vidéo de présentation institutionnelle en lecture automatique">
      </iframe>
    </div>

  </div>
</section>
{{-- ══════════════════════════════════════════════
     VIDÉO — Présentation institutionnelle en AUTOPLAY
     URL : https://youtu.be/vpefyh8UgLI
══════════════════════════════════════════════ --}}
{{-- ══════════════════════════════════════════════
     VIDÉO — Solution avec image de preview + lien
══════════════════════════════════════════════ --}}
<!-- <section class="video-section" aria-label="Présentation institutionnelle">
  <div class="video-container">

    <p class="video-label">Présentation institutionnelle</p>

    <div class="video-wrapper" style="position: relative; cursor: pointer;" onclick="window.open('https://youtu.be/vpefyh8UgLI', '_blank')">
      
      {{-- Image de preview YouTube --}}
      <img 
        src="https://img.youtube.com/vi/vpefyh8UgLI/maxresdefault.jpg" 
        alt="Présentation Fontaine Group Holding"
        style="width: 100%; height: 100%; object-fit: cover; position: absolute; inset: 0;"
        loading="eager"
        onerror="this.src='https://img.youtube.com/vi/vpefyh8UgLI/hqdefault.jpg'"
      />

      {{-- Bouton play overlay --}}
      <div style="
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 80px;
        height: 80px;
        background: rgba(184, 200, 232, 0.9);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        pointer-events: none;
      ">
        <svg width="40" height="40" viewBox="0 0 24 24" fill="var(--bg-base)">
          <polygon points="5,3 19,12 5,21" fill="currentColor"/>
        </svg>
      </div>

      {{-- Texte overlay --}}
      <p style="
        position: absolute;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        color: white;
        font-size: 0.9rem;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        text-shadow: 0 2px 4px rgba(0,0,0,0.5);
      ">Cliquez pour voir sur YouTube</p>

    </div>

  </div>
</section> -->

{{-- ══════════════════════════════════════════════
     VIDÉO — Présentation institutionnelle en AUTOPLAY
     Fichier local : /assets/videos/presentation.mp4
══════════════════════════════════════════════ --}}
<!-- <section class="video-section" aria-label="Vidéo de présentation institutionnelle">
  <div class="video-container">

    <p class="video-label">Présentation institutionnelle</p>

    <div class="video-wrapper">

      {{-- Vidéo HTML5 avec autoplay --}}
      <video
        class="presentation-video"
        autoplay
        muted
        loop
        playsinline
        preload="auto"
        poster="{{ asset('assets/images/video-poster.jpg') }}"
        style="width: 100%; height: 100%; object-fit: cover;">
        {{-- Plusieurs formats pour compatibilité --}}
        <source src="{{ asset('assets/videos/presentation.mp4') }}" type="video/mp4">
        <source src="{{ asset('assets/videos/presentation.webm') }}" type="video/webm">

        {{-- Message si vidéo non supportée --}}
        Votre navigateur ne supporte pas la lecture de vidéos.
      </video>

      {{-- Overlay optionnel pour le contrôle --}}
      <div class="video-controls" style="position: absolute; bottom: 20px; right: 20px; opacity: 0; transition: opacity 0.3s;">
        <button class="video-mute-toggle" aria-label="Couper/remettre le son">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="white">
            <path d="M3 9v6h4l5 5V4L7 9H3z" />
          </svg>
        </button>
      </div>

    </div>

  </div>
</section> -->
{{-- ══════════════════════════════════════════════
   


À PROPOS — Optimisé : micro-données Schema.org
══════════════════════════════════════════════ --}}
<section class="about-section" itemscope itemtype="https://schema.org/AboutPage">

  <p class="about-eyebrow" itemprop="name">À Propos</p>

  <h2 class="about-title" itemprop="headline">
    Fondé à Abidjan, <em>Fontaine Group Holding</em>
  </h2>

  <div class="about-divider" aria-hidden="true"></div>

  <div class="about-sub" itemprop="description">
    <p>est un véhicule d'investissement multi-stratégies spécialisé dans l'allocation
      de capital à haute valeur ajoutée.
      Nous accompagnons des entreprises à fort potentiel, des familles patrimoniales
      et des institutionnels dans la structuration, la croissance et la pérennisation
      de leurs actifs.</p>

    <p>Notre philosophie repose sur trois piliers : la rigueur analytique, la vision
      long terme et l'intégrité absolue.
      Présents sur les marchés africains, européens et moyen-orientaux, nous conjuguons
      expertise locale et standards internationaux.</p>
  </div>

</section>


{{-- ══════════════════════════════════════════════
     STATS — Commenté mais optimisé si décommenté
══════════════════════════════════════════════ --}}
{{--
<div class="stats-bar" itemscope itemtype="https://schema.org/Organization">
  <div class="stat-item">
    <div class="stat-num" itemprop="numberOfEmployees">18</div>
    <div class="stat-label">Sites Satellites</div>
  </div>
  <div class="stat-item">
    <div class="stat-num">5+</div>
    <div class="stat-label">Marchés Actifs</div>
  </div>
  <div class="stat-item">
    <div class="stat-num">12</div>
    <div class="stat-label">Ans d'Expertise</div>
  </div>
  <div class="stat-item">
    <div class="stat-num">3</div>
    <div class="stat-label">Continents</div>
  </div>
</div>
--}}


{{-- ══════════════════════════════════════════════
     CTA — Optimisé : aria-label pour boutons
══════════════════════════════════════════════ --}}
<section class="cta-section">

  <p class="cta-label">Rejoindre le groupe</p>
  <h2 class="cta-title">Prêt à bâtir votre<br /><em>avenir financier</em>&nbsp;?</h2>
  <p class="cta-sub">Nos équipes sont disponibles pour vous accompagner à chaque étape.</p>

  <div class="cta-buttons">
    <button class="btn-primary-gold" id="cta-services" aria-label="Découvrir nos services">Découvrir nos services</button>
    <button class="btn-outline-accent" id="cta-client" aria-label="Accéder à l'espace client">Espace client</button>
  </div>

</section>


{{-- ══════════════════════════════════════════════
     BOUTON WHATSAPP — Optimisé : SVG inline
══════════════════════════════════════════════ --}}
<a class="whatsapp-fab"
  href="https://wa.me/2250000000000"
  target="_blank"
  rel="noopener noreferrer"
  title="Écrire sur WhatsApp"
  aria-label="Écrire sur WhatsApp (nouvelle fenêtre)">

  <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" width="28" height="28">
    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
  </svg>
</a>


{{-- ══════════════════════════════════════════════
     COMPTEUR DE VUES — v2.3 : Badge stylisé avec microdata
══════════════════════════════════════════════ --}}
<div id="view-counter"
  aria-label="Nombre de visites sur cette page"
  title="Vues de la page"
  itemscope itemtype="https://schema.org/InteractionCounter">

  <span class="vc-eye" aria-hidden="true">
    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="14" height="14">
      <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
      <circle cx="12" cy="12" r="3" />
    </svg>
  </span>

  <span id="vc-num" aria-live="polite" itemprop="userInteractionCount">0</span>
  <span class="vc-label" itemprop="interactionType">vues</span>

</div>


{{-- ══════════════════════════════════════════════
     MODALS — Optimisées avec structure sémantique
══════════════════════════════════════════════ --}}

{{-- ── À Propos ── --}}
<div class="modal-overlay" id="modal-about"
  role="dialog"
  aria-modal="true"
  aria-labelledby="modal-about-title"
  aria-describedby="modal-about-desc">

  <div class="modal-box">
    <button class="modal-close" data-close="modal-about" aria-label="Fermer la boîte de dialogue">✕</button>

    <p class="modal-tag">Notre identité</p>
    <h2 class="modal-title" id="modal-about-title">À Propos</h2>
    <div class="modal-rule" aria-hidden="true"></div>

    <div class="modal-body-text" id="modal-about-desc">
      <p>
        Fondé à Abidjan,
        <strong class="modal-highlight">Fontaine Group Holding</strong>
        est un véhicule d'investissement multi-stratégies spécialisé dans l'allocation de capital
        à haute valeur ajoutée. Nous accompagnons des entreprises à fort potentiel, des familles
        patrimoniales et des institutionnels dans la structuration, la croissance et la pérennisation
        de leurs actifs.
      </p>
      <p class="modal-mt">
        Notre philosophie repose sur trois piliers : la
        <em class="modal-em">rigueur analytique</em>, la
        <em class="modal-em">vision long terme</em> et l'
        <em class="modal-em">intégrité absolue</em>.
        Présents sur les marchés africains, européens et moyen-orientaux, nous conjuguons expertise
        locale et standards internationaux.
      </p>
    </div>
  </div>
</div>

{{-- ── Nos Services ── --}}
<div class="modal-overlay" id="modal-services"
  role="dialog"
  aria-modal="true"
  aria-labelledby="modal-services-title">

  <div class="modal-box">
    <button class="modal-close" data-close="modal-services" aria-label="Fermer la boîte de dialogue">✕</button>

    <p class="modal-tag">Nos offres</p>
    <h2 class="modal-title" id="modal-services-title">Nos Services</h2>
    <div class="modal-rule" aria-hidden="true"></div>

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

{{-- ── Authentification ── --}}
<div class="modal-overlay" id="modal-auth"
  role="dialog"
  aria-modal="true"
  aria-labelledby="modal-auth-title">

  <div class="modal-box">
    <button class="modal-close" data-close="modal-auth" aria-label="Fermer la boîte de dialogue">✕</button>

    <p class="modal-tag">Espace client</p>
    <h2 class="modal-title" id="modal-auth-title">Accès Sécurisé</h2>
    <div class="modal-rule" aria-hidden="true"></div>

    <div class="auth-tabs" role="tablist">
      <button class="auth-tab active" data-tab="login" role="tab" id="tab-login" aria-selected="true" aria-controls="form-login">Connexion</button>
      <button class="auth-tab" data-tab="register" role="tab" id="tab-register" aria-selected="false" aria-controls="form-register">Inscription</button>
    </div>

    {{-- Connexion --}}
    <div class="auth-form active" id="form-login" role="tabpanel" aria-labelledby="tab-login">

      <div class="form-group">
        <label for="login-email">Adresse e-mail</label>
        <input id="login-email" type="email" placeholder="votre@email.com" autocomplete="email" required />
      </div>

      <div class="form-group">
        <label for="login-password">Mot de passe</label>
        <input id="login-password" type="password" placeholder="••••••••" autocomplete="current-password" required />
      </div>

      <button class="btn-submit" type="button" aria-label="Se connecter à votre compte">Se connecter</button>

      <p class="auth-note">
        Mot de passe oublié ?
        <a href="#" class="auth-link">Réinitialiser</a>
      </p>

    </div>

    {{-- Inscription --}}
    <div class="auth-form" id="form-register" role="tabpanel" aria-labelledby="tab-register">

      <div class="form-group">
        <label for="reg-name">Prénom &amp; Nom</label>
        <input id="reg-name" type="text" placeholder="Jean Fontaine" autocomplete="name" required />
      </div>

      <div class="form-group">
        <label for="reg-email">Adresse e-mail</label>
        <input id="reg-email" type="email" placeholder="votre@email.com" autocomplete="email" required />
      </div>

      <div class="form-group">
        <label for="reg-password">Mot de passe</label>
        <input id="reg-password" type="password" placeholder="Minimum 8 caractères" autocomplete="new-password" required minlength="8" />
      </div>

      <button class="btn-submit" type="button" aria-label="Créer un nouveau compte">Créer un compte</button>

      <p class="auth-note">
        En vous inscrivant, vous acceptez nos
        <a href="#" class="auth-link">Conditions d'utilisation</a>
      </p>

    </div>

  </div>
</div>

{{-- ── Contact / Info ── --}}
<div class="modal-overlay" id="modal-info"
  role="dialog"
  aria-modal="true"
  aria-labelledby="modal-info-title">

  <div class="modal-box">
    <button class="modal-close" data-close="modal-info" aria-label="Fermer la boîte de dialogue">✕</button>

    <p class="modal-tag">Documentation</p>
    <h2 class="modal-title" id="modal-info-title">Contact &amp; Info</h2>
    <div class="modal-rule" aria-hidden="true"></div>

    <p class="modal-body-text">
      Pour toute demande de partenariat, d'information ou d'accès investisseur, contactez nos équipes.
    </p>

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

{{-- Script pour gestion d'événements (optionnel car déjà dans app.js) --}}
@push('scripts')
<script>
  // Délégation d'événements minimale (complément si besoin)
  document.addEventListener('DOMContentLoaded', function() {
    // CTA Buttons (au cas où app.js n'est pas encore chargé)
    document.addEventListener('click', function(e) {
      if (e.target.closest('#cta-services')) {
        e.preventDefault();
        const modal = document.getElementById('modal-services');
        if (modal) modal.classList.add('open');
      }
      if (e.target.closest('#cta-client')) {
        e.preventDefault();
        const modal = document.getElementById('modal-auth');
        if (modal) modal.classList.add('open');
      }
    });
  });
</script>
@endpush

@endsection