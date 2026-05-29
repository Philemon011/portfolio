<!-- SECTION CONTACT -->
<section id="contact" class="section contact">
    <div class="container">

        <div class="section-header scroll-reveal">
            <span class="section-tagline">Collaborer</span>
            <h2 class="section-title">Me Contacter</h2>
        </div>

        <div class="contact-wrapper">

            <!-- Informations de contact -->
            <div class="contact-details scroll-reveal fade-up">

                <h3 class="contact-heading">Discutons de votre projet</h3>

                <p class="contact-subheading">
                    N'hésitez pas à m'écrire directement ou à me contacter
                    via WhatsApp ou téléphone pour échanger rapidement.
                </p>

                <div class="contact-links-list">

                    <a href="mailto:{{ $settings->email }}" class="contact-link-item">
                        <span class="link-label">Par e-mail</span>
                        <span class="link-val">{{ $settings->email }}</span>
                    </a>

                    @if($settings->telephone)
                    <a href="tel:{{ $settings->telephone }}" class="contact-link-item">
                        <span class="link-label">Téléphone</span>
                        <span class="link-val">{{ $settings->telephone }}</span>
                    </a>
                    @endif

                </div>

                <div class="contact-socials">

    @if($settings->linkedin)
    <a href="{{ $settings->linkedin }}" target="_blank"
        rel="noopener noreferrer" class="social-icon">
        LinkedIn
    </a>
    @endif

    @if($settings->github)
    <a href="{{ $settings->github }}" target="_blank"
        rel="noopener noreferrer" class="social-icon">
        GitHub
    </a>
    @endif

    @if($settings->facebook)
    <a href="{{ $settings->facebook }}" target="_blank"
        rel="noopener noreferrer" class="social-icon">
        Facebook
    </a>
    @endif

</div>

            </div>

            <!-- Formulaire de contact -->
            <div class="contact-form-box scroll-reveal fade-up delay-200">
                <form id="contact-form" class="minimal-form">
                    @csrf

                    <div class="form-row">
                        <div class="form-field">
                            <input type="text" id="form-name" name="nom"
                                class="form-input" placeholder="Nom *" required>
                        </div>
                        <div class="form-field">
                            <input type="email" id="form-email" name="email"
                                class="form-input" placeholder="Adresse e-mail *" required>
                        </div>
                    </div>

                    <div class="form-field">
                        <input type="text" id="form-subject" name="objet"
                            class="form-input" placeholder="Objet de votre message">
                    </div>

                    <div class="form-field">
                        <textarea id="form-message" name="message"
                            class="form-input form-textarea"
                            placeholder="Votre projet et détails... *"
                            rows="5" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary-pill w-full justify-center"
                        id="submit-btn">
                        <span>Envoyer le message</span>
                    </button>

                    <div class="form-feedback" id="form-feedback-message"></div>

                </form>
            </div>

        </div>
    </div>
</section>