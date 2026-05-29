<!-- SECTION TÉMOIGNAGES -->
<section id="temoignages" class="section temoignages">
    <div class="container">

        <div class="section-header scroll-reveal">
            <span class="section-tagline">Recommandations</span>
            <h2 class="section-title">Témoignages</h2>
        </div>

        <div class="testimonials-slider scroll-reveal fade-up">
            <div class="testimonials-track" id="testimonials-track">

                @foreach($testimonials as $testimonial)
                <div class="testimonial-slide">
                    <div class="testimonial-content-box">
                        <p class="testimonial-quote">
                            "{{ $testimonial->citation }}"
                        </p>
                        <div class="testimonial-meta">
                            <span class="client-name">{{ $testimonial->nom }}</span>
                            <span class="client-company">{{ $testimonial->entreprise }}</span>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

            <div class="slider-nav">
                <button class="slider-btn" id="slider-prev" aria-label="Précédent">
                    <i data-lucide="chevron-left"></i>
                </button>
                <div class="slider-dots" id="slider-dots"></div>
                <button class="slider-btn" id="slider-next" aria-label="Suivant">
                    <i data-lucide="chevron-right"></i>
                </button>
            </div>
        </div>

    </div>
</section>