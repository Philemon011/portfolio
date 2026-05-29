<!-- SECTION A PROPOS -->
<section id="apropos" class="section apropos">
    <div class="container">

        <div class="section-header scroll-reveal">
            <span class="section-tagline">A propos</span>
            <h2 class="section-title">À propos de moi</h2>
        </div>

        <div class="about-content">

            <div class="about-text scroll-reveal fade-up">
                <p class="about-lead">
                    {{ $settings->apropos_lead }}
                </p>
                <p class="about-desc">
                    {{ $settings->apropos_description }}
                </p>
            </div>

            <!-- Stats -->
            <div class="stats-row scroll-reveal fade-up delay-200">

                <div class="stat-box">
                    <div class="stat-value">
                        <span class="stat-plus">+</span>
                        <span class="stat-number" data-val="{{ $settings->annees_experience }}">0</span>
                    </div>
                    <span class="stat-label">Années d'expérience</span>
                </div>

                <div class="stat-box">
                    <div class="stat-value">
                        <span class="stat-plus">+</span>
                        <span class="stat-number" data-val="{{ $settings->projets_livres }}">0</span>
                    </div>
                    <span class="stat-label">Projets livrés</span>
                </div>

                <div class="stat-box">
                    <div class="stat-value">
                        <span class="stat-number" data-val="{{ $settings->taux_satisfaction }}">0</span>
                        <span class="stat-plus">%</span>
                    </div>
                    <span class="stat-label">Taux de satisfaction</span>
                </div>

            </div>

        </div>
    </div>
</section>