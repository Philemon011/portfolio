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

            <!-- Bande défilante -->
            <div class="tools-marquee-wrapper scroll-reveal fade-up delay-400">
                <div class="tools-marquee-track">
                    @foreach([1, 2] as $loop)
                    <div class="tools-marquee-list">
                        @foreach($tools as $tool)
                        <div class="tool-chip">
                            <img src="{{ asset('storage/' . $tool->logo) }}"
                                alt="{{ $tool->nom }}"
                                class="tool-logo">
                            <span class="tool-name">{{ $tool->nom }}</span>
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</section>