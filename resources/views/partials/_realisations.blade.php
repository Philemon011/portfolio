<!-- SECTION RÉALISATIONS -->
<section id="realisations" class="section realisations">
    <div class="container">

        <div class="section-header scroll-reveal">
            <span class="section-tagline">Travaux</span>
            <h2 class="section-title">Mes Réalisations</h2>
        </div>

        <!-- Filtres -->
        <div class="portfolio-tabs scroll-reveal">
            <button class="tab-btn active" data-filter="all">Tous</button>
            <button class="tab-btn" data-filter="design">Design</button>
            <button class="tab-btn" data-filter="dev">Développement</button>
        </div>

        <!-- Grille des projets -->
        <div class="portfolio-minimal-grid scroll-reveal fade-up">

            @foreach($projects as $project)
            <div class="project-card"
                data-category="{{ $project->filtre }}"
                data-project="{{ $project->id }}">

                <div class="project-img-box">
                    <img src="{{ asset('storage/' . $project->image) }}"
                        alt="{{ $project->titre }}"
                        class="project-img">
                </div>

                <div class="project-info">
                    <span class="project-cat">{{ $project->categorie }}</span>
                    <h3 class="project-title">{{ $project->titre }}</h3>
                </div>

            </div>
            @endforeach

        </div>
         <!-- Bouton voir plus -->
        <div class="voir-plus-wrapper scroll-reveal fade-up">
            <a href="{{ route('projects.index') }}" class="btn btn-primary-pill">
                <span>Voir tous mes projets</span>
                <i data-lucide="arrow-right"></i>
            </a>
        </div>
    </div>
</section>