/* ═══════════════════════════════════════════════════════
   FONTAINE GROUP HOLDING — app.js  v2.2
   Version optimisée pour performance
   ───────────────────────────────────────────────────────
   Optimisations :
   · Constants regroupées en objet CONFIG
   · Délégation d'événements (moins de listeners)
   · Debounce pour recherche
   · Memoization des sélecteurs DOM
   · Fonctions purifiées et réutilisables
   · Gestion d'erreurs try/catch
   · Cache des éléments DOM fréquents
═══════════════════════════════════════════════════════ */

/* ═══════════════════════════════════════════════════════
   CONSTANTES & CONFIGURATION
═══════════════════════════════════════════════════════ */
const CONFIG = {
    // Clés localStorage
    THEME_KEY: "fgh_theme",
    VIEWS_KEY: "fgh_views",

    // Durées (ms)
    ANIMATION: {
        VIEW_COUNTER_DELAY: 2100,
        VIEW_COUNTER_DURATION: 1200,
        FOCUS_DELAY: 80,
    },

    // Sélecteurs fréquents (cache)
    SELECTORS: {
        MODAL_OVERLAY: ".modal-overlay",
        MODAL_CLOSE: "[data-close]",
        AUTH_TAB: ".auth-tab",
        AUTH_FORM: ".auth-form",
        SITE_CARD: ".site-card",
        DATA_MODAL: "[data-modal]",
    },

    // Breakpoints (si nécessaire pour JS)
    BREAKPOINTS: {
        MOBILE: 768,
        TABLET: 992,
    },
};

// Cache DOM - sera rempli à l'initialisation
const DOM = {};

/* ═══════════════════════════════════════════════════════
   UTILITAIRES
═══════════════════════════════════════════════════════ */

/**
 * Sécurise l'accès au DOM avec cache
 */
function cacheElements() {
    const elements = [
        "header-ticker-track",
        "theme-toggle",
        "mega-wrapper",
        "mega-trigger",
        "mega-dropdown",
        "search-overlay",
        "search-input",
        "search-results",
        "search-open-btn",
        "search-close-btn",
        "mobile-menu",
        "mobile-menu-toggle",
        "mobile-close",
        "mobile-sites-btn",
        "btn-info",
        "cta-services",
        "cta-client",
        "vc-num",
        "view-counter",
    ];

    elements.forEach((id) => {
        DOM[id] = document.getElementById(id);
    });

    // Éléments multiples avec querySelector
    DOM.modalOverlays = document.querySelectorAll(
        CONFIG.SELECTORS.MODAL_OVERLAY,
    );
    DOM.modalCloseBtns = document.querySelectorAll(
        CONFIG.SELECTORS.MODAL_CLOSE,
    );
    DOM.dataModalElements = document.querySelectorAll(
        CONFIG.SELECTORS.DATA_MODAL,
    );
}

/**
 * Easing functions
 */
const Easing = {
    easeOutCubic: (t) => 1 - Math.pow(1 - t, 3),
    easeOutQuad: (t) => t * (2 - t),
};

/**
 * Debounce pour éviter les appels trop fréquents
 */
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

/* ═══════════════════════════════════════════════════════
   0. TICKER
═══════════════════════════════════════════════════════ */

const TICKER_PHRASES = [
    "Excellence & Rigueur",
    "Capital Privé",
    "Marchés Africains",
    "Gestion Patrimoniale",
    "Expansion Internationale",
    "Advisory M&A",
    "Côte d'Ivoire · Abidjan",
    "Intégrité Absolue",
    "Vision Long Terme",
    "Structuration Fiscale",
    "UEMOA · CEDEAO",
    "Standards Internationaux",
];

function buildHeaderTicker() {
    const track = DOM["header-ticker-track"];
    if (!track) return;

    // DocumentFragment pour meilleure performance
    const fragment = document.createDocumentFragment();

    for (let r = 0; r < 4; r++) {
        TICKER_PHRASES.forEach((phrase) => {
            const el = document.createElement("span");
            el.className = "header-ticker-item";
            el.innerHTML = `${phrase}<span class="header-ticker-sep" aria-hidden="true"></span>`;
            fragment.appendChild(el);
        });
    }

    track.innerHTML = "";
    track.appendChild(fragment);
}

/* ═══════════════════════════════════════════════════════
   1. MODAL SYSTEM — Optimisé avec délégation
═══════════════════════════════════════════════════════ */

function openModal(id, tab = null) {
    try {
        // Fermer tous les modaux d'abord
        DOM.modalOverlays?.forEach((m) => m.classList.remove("open"));

        const modal = document.getElementById(id);
        if (!modal) return;

        modal.classList.add("open");

        // Focus trap
        const closeBtn = modal.querySelector(".modal-close");
        if (closeBtn) {
            setTimeout(() => closeBtn.focus(), CONFIG.ANIMATION.FOCUS_DELAY);
        }

        // Gestion des tabs si nécessaire
        if (tab) {
            activateAuthTab(modal, tab);
        }
    } catch (error) {
        console.warn("Error opening modal:", error);
    }
}

function closeModal(id) {
    const modal = document.getElementById(id);
    if (modal) modal.classList.remove("open");
}

function activateAuthTab(modal, tab) {
    const tabs = modal.querySelectorAll(CONFIG.SELECTORS.AUTH_TAB);
    const forms = modal.querySelectorAll(CONFIG.SELECTORS.AUTH_FORM);

    tabs.forEach((t) => {
        t.classList.remove("active");
        t.setAttribute("aria-selected", "false");
    });

    forms.forEach((f) => f.classList.remove("active"));

    const activeTab = modal.querySelector(`.auth-tab[data-tab="${tab}"]`);
    const activeForm = document.getElementById(`form-${tab}`);

    if (activeTab) {
        activeTab.classList.add("active");
        activeTab.setAttribute("aria-selected", "true");
    }

    if (activeForm) activeForm.classList.add("active");
}

/* ═══════════════════════════════════════════════════════
   2. VIEW COUNTER — v2.2 avec gestion d'erreur
═══════════════════════════════════════════════════════ */

function initViewCounter() {
    const vcNum = DOM["vc-num"];
    if (!vcNum) return;

    try {
        // Incrémenter le compteur
        const currentViews = parseInt(
            localStorage.getItem(CONFIG.VIEWS_KEY) || "0",
        );
        const views = currentViews + 1;
        localStorage.setItem(CONFIG.VIEWS_KEY, views);

        // Animation du compteur
        animateCounter(vcNum, views);
    } catch (error) {
        // Fallback si localStorage indisponible
        vcNum.textContent = "1";
        console.warn("View counter error:", error);
    }
}

function animateCounter(element, targetValue) {
    let displayed = 0;
    const startTime = performance.now();

    function tick(now) {
        const elapsed = now - startTime;
        const progress = Math.min(
            elapsed / CONFIG.ANIMATION.VIEW_COUNTER_DURATION,
            1,
        );
        displayed = Math.round(Easing.easeOutCubic(progress) * targetValue);

        // Formatage avec k pour les milliers
        element.textContent =
            displayed >= 1000 ? (displayed / 1000).toFixed(1) + "k" : displayed;

        if (progress < 1) {
            requestAnimationFrame(tick);
        }
    }

    setTimeout(
        () => requestAnimationFrame(tick),
        CONFIG.ANIMATION.VIEW_COUNTER_DELAY,
    );
}

/* ═══════════════════════════════════════════════════════
   3. THEME TOGGLE
═══════════════════════════════════════════════════════ */

function applyTheme(theme) {
    try {
        document.documentElement.setAttribute("data-theme", theme);
        localStorage.setItem(CONFIG.THEME_KEY, theme);
    } catch (error) {
        console.warn("Theme error:", error);
    }
}

function initTheme() {
    try {
        const saved = localStorage.getItem(CONFIG.THEME_KEY);
        const prefersLight = window.matchMedia(
            "(prefers-color-scheme: light)",
        ).matches;
        applyTheme(saved || (prefersLight ? "light" : "dark"));
    } catch (error) {
        // Fallback
        document.documentElement.setAttribute("data-theme", "dark");
    }
}

/* ═══════════════════════════════════════════════════════
   4. MEGA MENU — Optimisé
═══════════════════════════════════════════════════════ */

let megaOpen = false;

function openMega() {
    const dropdown = DOM["mega-dropdown"];
    const trigger = DOM["mega-trigger"];
    if (!dropdown) return;

    dropdown.classList.add("open");
    trigger?.setAttribute("aria-expanded", "true");
    trigger?.classList.add("mega-open");
    megaOpen = true;
}

function closeMega() {
    const dropdown = DOM["mega-dropdown"];
    const trigger = DOM["mega-trigger"];
    if (!dropdown) return;

    dropdown.classList.remove("open");
    trigger?.setAttribute("aria-expanded", "false");
    trigger?.classList.remove("mega-open");
    megaOpen = false;
}

/* ═══════════════════════════════════════════════════════
   5. SEARCH OVERLAY — Avec debounce
═══════════════════════════════════════════════════════ */

const SITES_DB = [
    {
        name: "FGH Capital",
        cat: "Finance",
        icon: "◈",
        href: "#",
        desc: "Fonds d'investissement privé",
    },
    {
        name: "FGH Patrimoine",
        cat: "Finance",
        icon: "◇",
        href: "#",
        desc: "Gestion de patrimoine & family office",
    },
    {
        name: "FGH Advisory",
        cat: "Conseil",
        icon: "△",
        href: "#",
        desc: "M&A et restructuration stratégique",
    },
    {
        name: "FGH Immo",
        cat: "Immobilier",
        icon: "⬡",
        href: "#",
        desc: "Investissements immobiliers premium",
    },
    {
        name: "FGH Digital",
        cat: "Technologie",
        icon: "⬢",
        href: "#",
        desc: "Transformation numérique & FinTech",
    },
    {
        name: "FGH Trade",
        cat: "Commerce",
        icon: "○",
        href: "#",
        desc: "Commerce international & distribution",
    },
    {
        name: "FGH Markets",
        cat: "Finance",
        icon: "◉",
        href: "#",
        desc: "Marchés financiers UEMOA & CEDEAO",
    },
    {
        name: "FGH Résidences",
        cat: "Immobilier",
        icon: "▽",
        href: "#",
        desc: "Programmes résidentiels haut de gamme",
    },
    {
        name: "FGH Fiscal",
        cat: "Conseil",
        icon: "◫",
        href: "#",
        desc: "Structuration fiscale multi-juridictions",
    },
    {
        name: "FGH Labs",
        cat: "Technologie",
        icon: "◪",
        href: "#",
        desc: "R&D et innovation technologique",
    },
    {
        name: "FGH Agro",
        cat: "Commerce",
        icon: "◬",
        href: "#",
        desc: "Investissements agro-industriels",
    },
    {
        name: "FGH Crédit",
        cat: "Finance",
        icon: "◭",
        href: "#",
        desc: "Solutions de financement sur-mesure",
    },
    {
        name: "FGH Commercial",
        cat: "Immobilier",
        icon: "◮",
        href: "#",
        desc: "Parcs & bureaux commerciaux",
    },
    {
        name: "FGH Legal",
        cat: "Conseil",
        icon: "◯",
        href: "#",
        desc: "Conseil juridique & conformité",
    },
    {
        name: "FGH Data",
        cat: "Technologie",
        icon: "⬟",
        href: "#",
        desc: "Intelligence économique & data",
    },
    {
        name: "FGH Énergie",
        cat: "Commerce",
        icon: "⬠",
        href: "#",
        desc: "Énergies renouvelables & infrastructure",
    },
    {
        name: "FGH Diaspora",
        cat: "Finance",
        icon: "⬡",
        href: "#",
        desc: "Services financiers diaspora africaine",
    },
    {
        name: "FGH International",
        cat: "Conseil",
        icon: "◆",
        href: "#",
        desc: "Expansion Europe & Moyen-Orient",
    },
];

function openSearch() {
    const overlay = DOM["search-overlay"];
    const input = DOM["search-input"];
    if (!overlay) return;

    overlay.classList.add("open");
    setTimeout(() => input?.focus(), CONFIG.ANIMATION.FOCUS_DELAY);
    renderSearchResults("");
}

function closeSearch() {
    const overlay = DOM["search-overlay"];
    const input = DOM["search-input"];

    if (overlay) overlay.classList.remove("open");
    if (input) {
        input.value = "";
        renderSearchResults("");
    }
}

function renderSearchResults(query) {
    const container = DOM["search-results"];
    if (!container) return;

    const q = query.toLowerCase().trim();
    const results = q
        ? SITES_DB.filter(
              (s) =>
                  s.name.toLowerCase().includes(q) ||
                  s.cat.toLowerCase().includes(q) ||
                  s.desc.toLowerCase().includes(q),
          )
        : SITES_DB;

    if (results.length === 0) {
        container.innerHTML = `<p class="search-no-results">Aucun résultat pour "<strong>${query}</strong>"</p>`;
        return;
    }

    container.innerHTML = results
        .map(
            (s) => `
        <a class="search-result-item" href="${s.href}" role="listitem">
            <span class="sri-icon" aria-hidden="true">${s.icon}</span>
            <div>
                <div class="sri-name">${s.name}</div>
                <div class="sri-cat">${s.cat} · ${s.desc}</div>
            </div>
            <span class="sri-arrow" aria-hidden="true">→</span>
        </a>
    `,
        )
        .join("");
}

// Version debounced pour l'input
const debouncedRender = debounce(renderSearchResults, 150);

/* ═══════════════════════════════════════════════════════
   6. MOBILE MENU
═══════════════════════════════════════════════════════ */

function closeMobileMenu() {
    const menu = DOM["mobile-menu"];
    const toggle = DOM["mobile-menu-toggle"];

    menu?.classList.remove("active");
    toggle?.setAttribute("aria-expanded", "false");
}

function toggleMobileMenu() {
    const menu = DOM["mobile-menu"];
    const toggle = DOM["mobile-menu-toggle"];
    if (!menu || !toggle) return;

    const isOpen = menu.classList.contains("active");

    if (isOpen) {
        closeMobileMenu();
    } else {
        menu.classList.add("active");
        toggle.setAttribute("aria-expanded", "true");
    }
}

/* ═══════════════════════════════════════════════════════
   7. GESTIONNAIRE D'ÉVÉNEMENTS UNIFIÉ (Délégation)
═══════════════════════════════════════════════════════ */

function setupEventDelegation() {
    // Clics globaux
    document.addEventListener("click", handleGlobalClick);

    // Keyboard events
    document.addEventListener("keydown", handleGlobalKeydown);

    // Input events (search)
    const searchInput = DOM["search-input"];
    if (searchInput) {
        searchInput.addEventListener("input", (e) => {
            debouncedRender(e.target.value);
        });
    }

    // Mega menu hovers
    const megaWrapper = DOM["mega-wrapper"];
    if (megaWrapper) {
        megaWrapper.addEventListener("mouseenter", openMega);
        megaWrapper.addEventListener("mouseleave", closeMega);

        // Click pour mobile
        const megaTrigger = DOM["mega-trigger"];
        megaTrigger?.addEventListener("click", (e) => {
            e.stopPropagation();
            megaOpen ? closeMega() : openMega();
        });
    }

    // Theme toggle
    const themeToggle = DOM["theme-toggle"];
    themeToggle?.addEventListener("click", () => {
        const current = document.documentElement.getAttribute("data-theme");
        applyTheme(current === "light" ? "dark" : "light");
    });

    // Mobile menu toggle
    const mobileToggle = DOM["mobile-menu-toggle"];
    mobileToggle?.addEventListener("click", toggleMobileMenu);

    const mobileClose = DOM["mobile-close"];
    mobileClose?.addEventListener("click", closeMobileMenu);

    // Mobile sites button
    const mobileSitesBtn = DOM["mobile-sites-btn"];
    mobileSitesBtn?.addEventListener("click", () => {
        closeMobileMenu();
        openSearch();
    });

    // Search buttons
    DOM["search-open-btn"]?.addEventListener("click", openSearch);
    DOM["search-close-btn"]?.addEventListener("click", closeSearch);
}

function handleGlobalClick(e) {
    const target = e.target;

    // Modals - ouverture via data-modal
    if (target.closest(CONFIG.SELECTORS.DATA_MODAL)) {
        e.preventDefault();
        const btn = target.closest(CONFIG.SELECTORS.DATA_MODAL);
        closeMobileMenu();
        openModal(btn.dataset.modal, btn.dataset.tab || null);
    }

    // Modals - fermeture via data-close
    if (target.closest(CONFIG.SELECTORS.MODAL_CLOSE)) {
        const btn = target.closest(CONFIG.SELECTORS.MODAL_CLOSE);
        closeModal(btn.dataset.close);
    }

    // Modals - fermeture sur overlay
    if (target.classList.contains("modal-overlay")) {
        target.classList.remove("open");
    }

    // Auth tabs
    if (target.closest(CONFIG.SELECTORS.AUTH_TAB)) {
        const tab = target.closest(CONFIG.SELECTORS.AUTH_TAB);
        const modal = tab.closest(".modal-box");
        if (!modal) return;

        // Désactiver tous les tabs
        modal.querySelectorAll(CONFIG.SELECTORS.AUTH_TAB).forEach((t) => {
            t.classList.remove("active");
            t.setAttribute("aria-selected", "false");
        });

        modal.querySelectorAll(CONFIG.SELECTORS.AUTH_FORM).forEach((f) => {
            f.classList.remove("active");
        });

        // Activer le tab cliqué
        tab.classList.add("active");
        tab.setAttribute("aria-selected", "true");

        const form = document.getElementById("form-" + tab.dataset.tab);
        if (form) form.classList.add("active");
    }

    // CTA Buttons
    if (target.closest("#cta-services")) {
        e.preventDefault();
        openModal("modal-services");
    }

    if (target.closest("#cta-client")) {
        e.preventDefault();
        openModal("modal-auth");
    }

    // Info button
    if (target.closest("#btn-info")) {
        openModal("modal-info");
    }

    // Fermer mega menu si clic hors zone
    const megaWrapper = DOM["mega-wrapper"];
    if (megaWrapper && !megaWrapper.contains(target)) {
        closeMega();
    }

    // Fermer search si clic sur overlay
    const searchOverlay = DOM["search-overlay"];
    if (searchOverlay && target === searchOverlay) {
        closeSearch();
    }
}

function handleGlobalKeydown(e) {
    // Escape - fermer modals, search, mega menu
    if (e.key === "Escape") {
        // Fermer modals
        DOM.modalOverlays?.forEach((m) => m.classList.remove("open"));

        // Fermer search
        const searchOverlay = DOM["search-overlay"];
        if (searchOverlay?.classList.contains("open")) {
            closeSearch();
        }

        // Fermer mega menu
        closeMega();
    }

    // Ctrl/Cmd + K - ouvrir search
    if ((e.metaKey || e.ctrlKey) && e.key === "k") {
        e.preventDefault();
        openSearch();
    }
}

/* ═══════════════════════════════════════════════════════
   8. INITIALISATION
═══════════════════════════════════════════════════════ */

// Appliquer le thème immédiatement (anti-FOUC)
initTheme();

// Initialisation au chargement du DOM
document.addEventListener("DOMContentLoaded", () => {
    // Cache les éléments DOM
    cacheElements();

    // Construire le ticker
    buildHeaderTicker();

    // Configurer la délégation d'événements
    setupEventDelegation();

    // Initialiser le compteur de vues
    initViewCounter();
});

/* ═══════════════════════════════════════════════════════
   9. VIDÉO — Gestion du placeholder (optionnel)
═══════════════════════════════════════════════════════ */

// Optionnel : Cacher le placeholder quand la vidéo charge
document.addEventListener("DOMContentLoaded", () => {
    const videoIframe = document.querySelector(".video-wrapper iframe");
    const placeholder = document.querySelector(".video-placeholder");

    if (videoIframe && placeholder) {
        videoIframe.addEventListener("load", () => {
            placeholder.style.display = "none";
        });
    }
});
