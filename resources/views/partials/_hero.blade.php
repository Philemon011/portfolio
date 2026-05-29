<!-- SECTION ACCUEIL (HERO) -->
<section id="accueil" class="section hero">
    <div class="container hero-container">
        <div class="hero-wrapper">

            <!-- Avatar -->
            <div class="hero-avatar scroll-reveal fade-up">
                <div class="avatar-circle">
                    <div class="avatar-visual light-avatar">
                        <img src="{{ asset('storage/' . $settings->avatar_light) }}"
                            alt="{{ $settings->nom }}"
                            class="dark-portrait-img">
                    </div>
                    <div class="avatar-visual dark-avatar">
                        <img src="{{ asset('storage/' . $settings->avatar_dark) }}"
                            alt="{{ $settings->nom }}"
                            class="dark-portrait-img">
                    </div>
                </div>
            </div>

            <!-- Welcome -->
            <div class="hero-welcome scroll-reveal fade-up delay-100">
                Salut, moi c'est {{ $settings->nom }} <span class="wave-emoji">👋</span>
            </div>

            <!-- Titre -->
            <h1 class="hero-title scroll-reveal fade-up delay-200">
                {!! $settings->hero_titre !!}
            </h1>

            <!-- Sous-titre -->
            <p class="hero-subtitle scroll-reveal fade-up delay-300">
                {!! $settings->hero_sous_titre !!}
            </p>

        </div>
    </div>
</section>