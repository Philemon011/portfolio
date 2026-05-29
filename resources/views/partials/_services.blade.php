<!-- SECTION SERVICES -->
<section id="services" class="section services">
    <div class="container">

        <div class="section-header scroll-reveal">
            <span class="section-tagline">Expertise</span>
            <h2 class="section-title">Ce que je fais</h2>
        </div>

        <div class="services-minimal-list">

            @foreach($services as $service)
            <div class="service-item scroll-reveal fade-up">
                <div class="service-number">
                    {{ str_pad($service->numero, 2, '0', STR_PAD_LEFT) }}
                </div>
                <div class="service-body">
                    <h3 class="service-name">{{ $service->titre }}</h3>
                    <p class="service-details">{{ $service->description }}</p>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>