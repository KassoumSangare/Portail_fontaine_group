<footer class="footer">

    <div class="footer-top">

        {{-- Marque --}}
        <div class="footer-brand">
            {{-- [FIX] height="auto" supprimé — géré par .footer-logo en CSS --}}
            <img class="footer-logo"
                src="{{ asset('assets/images/logo_fontaine_group.jpeg') }}"
                alt="Fontaine Group Holding"
                width="180"
                loading="lazy" />
            <p class="footer-desc">
                Véhicule d'investissement multi-stratégies spécialisé dans l'allocation
                de capital à haute valeur ajoutée depuis Abidjan, Côte d'Ivoire.
            </p>
        </div>

        {{-- Navigation --}}
        <div class="footer-links">
            <p class="footer-title">Navigation</p>
            {{-- [FIX] e.preventDefault() géré par délégation JS sur data-modal --}}
            <a href="#" data-modal="modal-about">À Propos</a>
            <a href="#" data-modal="modal-services">Nos Services</a>
            <a href="#" data-modal="modal-info">Contact &amp; Info</a>
            <a href="#" data-modal="modal-auth" data-tab="login">Espace Client</a>
            <a href="#" data-modal="modal-auth" data-tab="register">S'inscrire</a>
        </div>

        {{-- Contact --}}
        <div class="footer-contact">
            <p class="footer-title">Contact</p>
            <address>
                <p>Plateau, Avenue Botreau-Roussel<br />Abidjan, Côte d'Ivoire</p>
                {{-- [FIX] style inline → classe CSS .footer-contact address + p --}}
                <p>Route de Florissant 12<br />1206 Genève, Suisse</p>
            </address>
            <p>
                <a href="mailto:contact@fontainegroup.ci">contact@fontainegroup.ci</a>
            </p>
            <p>
                <a href="mailto:ir@fontainegroup.ci">ir@fontainegroup.ci</a>
            </p>
        </div>

    </div>{{-- /footer-top --}}

    {{-- [FIX] footer-bottom : ordre logique sur mobile (copy → location → social) --}}
    <div class="footer-bottom">

        <p>&copy; {{ date('Y') }} Fontaine Group Holding. Tous droits réservés.</p>

        {{-- [FIX] .footer-location désormais dans style.css --}}
        <p class="footer-location">Abidjan · Genève · UEMOA</p>

        {{-- [FIX] Bootstrap Icons chargé dans base.blade.php --}}
        <div class="footer-social">
            <a href="#"
                title="LinkedIn"
                aria-label="Notre page LinkedIn"
                target="_blank" rel="noopener">
                <i class="bi bi-linkedin" aria-hidden="true"></i>
            </a>
            <a href="#"
                title="X / Twitter"
                aria-label="Notre compte X"
                target="_blank" rel="noopener">
                <i class="bi bi-twitter-x" aria-hidden="true"></i>
            </a>
            <a href="https://wa.me/2250000000000"
                title="WhatsApp"
                aria-label="Nous contacter sur WhatsApp"
                target="_blank" rel="noopener">
                <i class="bi bi-whatsapp" aria-hidden="true"></i>
            </a>
            <a href="#"
                title="Instagram"
                aria-label="Notre compte Instagram"
                target="_blank" rel="noopener">
                <i class="bi bi-instagram" aria-hidden="true"></i>
            </a>
        </div>

    </div>

</footer>