/**
 * PORTFOLIO CLIENT-SIDE INTERACTION SCRIPT
 * Thomas.dev - Premium Minimalist One-Page
 */

document.addEventListener('DOMContentLoaded', () => {

    // Initialize Lucide Icons
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }

    /* ==========================================================================
       CUSTOM CURSOR (OGUZ.DESIGN STYLE)
       ========================================================================== */
    const cursor = document.getElementById('custom-cursor');

    if (cursor && window.innerWidth > 1024) {
        document.addEventListener('mousemove', (e) => {
            // Position using translate3d for smooth hardware-accelerated movement
            cursor.style.transform = `translate3d(${e.clientX}px, ${e.clientY}px, 0)`;
            cursor.style.opacity = '1';
        });

        // Toggle state when hovering elements
        const hoverables = document.querySelectorAll('a, button, .project-card, .tab-btn');
        hoverables.forEach(item => {
            item.addEventListener('mouseenter', () => {
                cursor.classList.add('hover');
            });
            item.addEventListener('mouseleave', () => {
                cursor.classList.remove('hover');
            });
        });

        document.addEventListener('mouseleave', () => {
            cursor.style.opacity = '0';
        });
    }

    /* ==========================================================================
       THEME SYSTEM (LIGHT/DARK)
       ========================================================================== */
    const themeToggleBtn = document.getElementById('theme-toggle-btn');
    const htmlElement = document.documentElement;

    const savedTheme = localStorage.getItem('portfolio-theme') || 'dark';
    htmlElement.setAttribute('data-theme', savedTheme);

    if (themeToggleBtn) {
        themeToggleBtn.addEventListener('click', () => {
            const currentTheme = htmlElement.getAttribute('data-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

            htmlElement.setAttribute('data-theme', newTheme);
            localStorage.setItem('portfolio-theme', newTheme);
        });
    }

    /* ==========================================================================
       MOBILE DRAWER NAVIGATION
       ========================================================================== */
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileDrawer = document.getElementById('mobile-drawer');
    const drawerLinks = document.querySelectorAll('.drawer-link');

    if (mobileMenuBtn && mobileDrawer) {
        mobileMenuBtn.addEventListener('click', () => {
            mobileMenuBtn.classList.toggle('active');
            mobileDrawer.classList.toggle('active');
            document.body.style.overflow = mobileDrawer.classList.contains('active') ? 'hidden' : '';
        });

        drawerLinks.forEach(link => {
            link.addEventListener('click', () => {
                mobileMenuBtn.classList.remove('active');
                mobileDrawer.classList.remove('active');
                document.body.style.overflow = '';
            });
        });
    }

    /* ==========================================================================
       HEADER SCROLL STATES & ACTIVE NAVIGATION STATE SYNC
       ========================================================================== */
    const header = document.querySelector('.header');
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.nav-link');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 40) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }

        let scrollY = window.pageYOffset;

        sections.forEach(current => {
            const sectionHeight = current.offsetHeight;
            const sectionTop = current.offsetTop - 120;
            const sectionId = current.getAttribute('id');

            if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
                navLinks.forEach(link => {
                    link.classList.remove('active');
                    if (link.getAttribute('href') === `#${sectionId}`) {
                        link.classList.add('active');
                    }
                });

                drawerLinks.forEach(link => {
                    link.classList.remove('active');
                    if (link.getAttribute('href') === `#${sectionId}`) {
                        link.classList.add('active');
                    }
                });
            }
        });
    });

    /* ==========================================================================
       SCROLL-TRIGGERED ANIMATIONS (INTERSECTION OBSERVER)
       ========================================================================== */
    const animElements = document.querySelectorAll('.scroll-reveal');
    const statNums = document.querySelectorAll('.stat-number');

    const animationObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');

                // If this is the about section, trigger numbers counters
                if (entry.target.classList.contains('apropos')) {
                    statNums.forEach(num => {
                        animateCounter(num);
                    });
                }

                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -40px 0px'
    });

    animElements.forEach(element => {
        animationObserver.observe(element);
    });

    const aboutSection = document.getElementById('apropos');
    if (aboutSection) {
        animationObserver.observe(aboutSection);
    }

    function animateCounter(element) {
        const targetValue = parseInt(element.getAttribute('data-val'), 10);
        let currentValue = 0;
        const duration = 2000;
        const stepTime = Math.max(Math.floor(duration / targetValue), 20);

        const counterInterval = setInterval(() => {
            currentValue += 1;
            element.textContent = currentValue;

            if (currentValue >= targetValue) {
                element.textContent = targetValue;
                clearInterval(counterInterval);
            }
        }, stepTime);
    }

    /* ==========================================================================
       PORTFOLIO FILTERS (TABS)
       ========================================================================== */
    const tabButtons = document.querySelectorAll('.tab-btn');
    const projectCards = document.querySelectorAll('.project-card');

    tabButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            tabButtons.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            const filterValue = btn.getAttribute('data-filter');

            projectCards.forEach(card => {
                const category = card.getAttribute('data-category');

                if (filterValue === 'all' || category === filterValue) {
                    card.classList.remove('hidden');
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'scale(1)';
                    }, 50);
                } else {
                    card.style.opacity = '0';
                    card.style.transform = 'scale(0.96)';
                    setTimeout(() => {
                        card.classList.add('hidden');
                    }, 300);
                }
            });
        });
    });

/* ==========================================================================
   PORTFOLIO PROJECT DETAILS DATA & MODAL INJECTOR
   ========================================================================== */
const projectsData = window.projectsData || {};

const modal = document.getElementById('portfolio-modal');
const modalCloseBtn = document.getElementById('modal-close-btn');
const modalBody = document.getElementById('modal-body-content');

function openModal(projectId) {
    const data = projectsData[projectId];
    if (!data) return;

    // Technologies : tableau PHP devient tableau JS grâce à @json
    const techBadges = data.technologies
        .map(tech => `<span class="tag-badge">${tech}</span>`)
        .join('');

    // Lien du projet si disponible
    const lienBtn = data.lien
        ? `<a href="${data.lien}" target="_blank" rel="noopener noreferrer"
                class="btn btn-primary-pill btn-sm">
                <span>Voir le projet</span>
           </a>`
        : '';

    modalBody.innerHTML = `
        <img src="/storage/${data.image}"
            alt="${data.titre}"
            class="modal-project-img">

        <div class="modal-project-header">
            <span class="modal-project-category">${data.categorie}</span>
            <h3 class="modal-project-title">${data.titre}</h3>
        </div>

        <div class="modal-project-meta">
            <div class="meta-item">
                <span class="meta-label">Client</span>
                <span class="meta-value">${data.client}</span>
            </div>
            <div class="meta-item">
                <span class="meta-label">Date</span>
                <span class="meta-value">${data.date}</span>
            </div>
        </div>

        <h4 class="modal-project-desc-title">À propos du projet</h4>
        <p class="modal-project-desc">${data.description}</p>

        <h4 class="modal-project-desc-title">Technologies exploitées</h4>
        <div class="modal-project-tags">
            ${techBadges}
        </div>

        <div class="modal-project-actions">
            ${lienBtn}
            <a href="#contact" class="btn btn-primary-pill btn-sm"
                onclick="closeModal()">
                <span>Discuter d'un projet similaire</span>
            </a>
        </div>
    `;

    modal.classList.add('active');
    modal.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';
}

window.closeModal = function () {
    modal.classList.remove('active');
    modal.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';
};

// Ouvrir le modal au clic sur une carte projet
projectCards.forEach(card => {
    card.addEventListener('click', () => {
        const projId = card.getAttribute('data-project');
        openModal(projId);
    });
});

// Fermer le modal
if (modalCloseBtn) {
    modalCloseBtn.addEventListener('click', closeModal);
}
if (modal) {
    modal.querySelector('.modal-backdrop').addEventListener('click', closeModal);
}
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && modal.classList.contains('active')) {
        closeModal();
    }
});

    /* ==========================================================================
       TESTIMONIALS SLIDER (CAROUSEL)
       ========================================================================== */
    const sliderTrack = document.getElementById('testimonials-track');
    const slides = document.querySelectorAll('.testimonial-slide');
    const prevBtn = document.getElementById('slider-prev');
    const nextBtn = document.getElementById('slider-next');
    const dotsContainer = document.getElementById('slider-dots');

    let currentSlideIndex = 0;
    const slidesCount = slides.length;

    if (sliderTrack && slidesCount > 0) {
        // Create navigation dots dynamically
        for (let i = 0; i < slidesCount; i++) {
            const dot = document.createElement('button');
            dot.classList.add('slider-dot');
            if (i === 0) dot.classList.add('active');
            dot.setAttribute('aria-label', `Voir le témoignage ${i + 1}`);
            dotsContainer.appendChild(dot);

            dot.addEventListener('click', () => {
                goToSlide(i);
            });
        }

        const dots = document.querySelectorAll('.slider-dot');

        function goToSlide(index) {
            currentSlideIndex = index;
            sliderTrack.style.transform = `translateX(-${currentSlideIndex * 100}%)`;

            dots.forEach(dot => dot.classList.remove('active'));
            if (dots[currentSlideIndex]) {
                dots[currentSlideIndex].classList.add('active');
            }
        }

        nextBtn.addEventListener('click', () => {
            let nextIndex = currentSlideIndex + 1;
            if (nextIndex >= slidesCount) nextIndex = 0;
            goToSlide(nextIndex);
        });

        prevBtn.addEventListener('click', () => {
            let prevIndex = currentSlideIndex - 1;
            if (prevIndex < 0) prevIndex = slidesCount - 1;
            goToSlide(prevIndex);
        });

        // Auto slider rotation
        let autoSlideTimer = setInterval(() => {
            let nextIndex = currentSlideIndex + 1;
            if (nextIndex >= slidesCount) nextIndex = 0;
            goToSlide(nextIndex);
        }, 8000);

        const sliderContainer = document.querySelector('.testimonials-slider');
        if (sliderContainer) {
            sliderContainer.addEventListener('mouseenter', () => {
                clearInterval(autoSlideTimer);
            });
        }
    }

    /* ==========================================================================
   CONTACT FORM SUBMIT
   ========================================================================== */
    const contactForm = document.getElementById('contact-form');
    const submitBtn = document.getElementById('submit-btn');
    const formFeedback = document.getElementById('form-feedback-message');

    if (contactForm) {
        contactForm.addEventListener('submit', async (e) => {
            e.preventDefault();

            // Afficher le loader
            submitBtn.disabled = true;
            const originalBtnContent = submitBtn.innerHTML;
            submitBtn.innerHTML = `<span>Envoi en cours...</span><div class="loader"></div>`;

            // Récupérer le token CSRF depuis le formulaire
            const csrfToken = contactForm.querySelector('input[name="_token"]').value;

            // Récupérer les données du formulaire
            const formData = {
                nom: contactForm.querySelector('#form-name').value,
                email: contactForm.querySelector('#form-email').value,
                objet: contactForm.querySelector('#form-subject').value,
                message: contactForm.querySelector('#form-message').value,
            };

            try {
                const response = await fetch('/contact', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify(formData),
                });

                const data = await response.json();

                if (data.success) {
                    // Succès
                    formFeedback.textContent = data.message;
                    formFeedback.className = 'form-feedback active success';
                    contactForm.reset();
                } else {
                    // Erreur serveur
                    formFeedback.textContent = 'Une erreur est survenue. Veuillez réessayer.';
                    formFeedback.className = 'form-feedback active error';
                }

            } catch (error) {
                // Erreur réseau
                formFeedback.textContent = 'Une erreur est survenue. Veuillez réessayer.';
                formFeedback.className = 'form-feedback active error';
            }

            // Restaurer le bouton
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalBtnContent;

            // Cacher le message après 5 secondes
            setTimeout(() => {
                formFeedback.classList.remove('active');
            }, 5000);
        });
    }
});
