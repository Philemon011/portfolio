<!DOCTYPE html>
<html lang="fr" data-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Philemon Dev | Portfolio</title>

    <!-- Meta SEO -->
    <meta name="description" content="{{ $settings->hero_sous_titre }}">
    <meta name="keywords" content="développeur web, designer ui/ux, freelance, portfolio">
    <meta name="author" content="{{ $settings->nom }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Caveat:wght@400;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
</head>

<body>
    <!-- Custom Cursor -->
    <div class="custom-cursor" id="custom-cursor">
        <div class="cursor-circle"></div>
        <div class="cursor-dot"></div>
        <span class="cursor-label">Cursor</span>
    </div>

    <!-- Header -->
    <header class="header">
        <div class="header-container">
            <a href="mailto:{{ $settings->email }}" class="header-email">
                <span class="email-icon-box">
                    <i data-lucide="mail"></i>
                </span>
                <span class="email-text">email</span>
            </a>

            <nav class="nav">
                <ul class="nav-list">
                    <li><a href="#accueil" class="nav-link active">Accueil</a></li>
                    <li><a href="#apropos" class="nav-link">A Propos</a></li>
                    <li><a href="#services" class="nav-link">Services</a></li>
                    <li><a href="#realisations" class="nav-link">Réalisations</a></li>
                    <li><a href="#temoignages" class="nav-link">Témoignages</a></li>
                    <li><a href="#contact" class="nav-link">Contact</a></li>
                </ul>
            </nav>

            <div class="header-actions">
                <button class="theme-toggle" id="theme-toggle-btn" aria-label="Changer de thème">
                    <i data-lucide="moon" class="icon-moon"></i>
                    <i data-lucide="sun" class="icon-sun"></i>
                </button>
                <button class="menu-toggle" id="mobile-menu-btn" aria-label="Ouvrir le menu">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </button>
            </div>
        </div>
    </header>

    <!-- Mobile Drawer -->
    <div class="mobile-drawer" id="mobile-drawer">
        <nav class="drawer-nav">
            <ul class="drawer-list">
                <li><a href="#accueil" class="drawer-link">Accueil</a></li>
                <li><a href="#apropos" class="drawer-link">A Propos</a></li>
                <li><a href="#services" class="drawer-link">Services</a></li>
                <li><a href="#realisations" class="drawer-link">Réalisations</a></li>
                <li><a href="#temoignages" class="drawer-link">Témoignages</a></li>
                <li><a href="#contact" class="drawer-link">Contact</a></li>
            </ul>
            <div class="drawer-actions">
                @if($settings->whatsapp)
                <a href="https://wa.me/{{ $settings->whatsapp }}" target="_blank" rel="noopener noreferrer"
                    class="btn btn-whatsapp w-full justify-center">
                    <svg class="icon-whatsapp" viewBox="0 0 24 24" width="20" height="20" stroke="currentColor"
                        stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z" />
                    </svg>
                    WhatsApp
                </a>
                @endif
            </div>
        </nav>
    </div>

    <!-- Contenu principal -->
    <main>
        @yield('content')
    </main>

    <!-- PORTFOLIO PROJECT DETAIL MODAL -->
    <div class="modal" id="portfolio-modal" aria-hidden="true" role="dialog">
        <div class="modal-backdrop"></div>
        <div class="modal-wrapper">
            <div class="modal-content">
                <button class="modal-close" id="modal-close-btn" aria-label="Fermer">
                    <i data-lucide="x"></i>
                </button>
                <div class="modal-body" id="modal-body-content">
                    <!-- Contenu dynamique injecté par le JS -->
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container footer-container">
            <span class="logo-text">philemon<span class="dot">.</span>dev</span>
            <p class="copyright">&copy; {{ date('Y') }} Philémon Dev. Tous droits réservés.</p>
        </div>
    </footer>

    <!-- Données dynamiques pour le JS -->
    <script>
        window.projectsData = @json($projects->keyBy('id'));
    </script>

    <!-- JS -->
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>