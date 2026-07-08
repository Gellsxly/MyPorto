document.addEventListener('DOMContentLoaded', () => {
    
    // ==========================================================================
    // 1. MOBILE MENU TOGGLE
    // ==========================================================================
    const navToggle = document.getElementById('nav-toggle-btn');
    const navMenu = document.getElementById('nav-menu-list');
    const navLinks = document.querySelectorAll('.nav-link');

    if (navToggle && navMenu) {
        navToggle.addEventListener('click', () => {
            navToggle.classList.toggle('active');
            navMenu.classList.toggle('active');
        });

        // Close menu when a link is clicked
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                navToggle.classList.remove('active');
                navMenu.classList.remove('active');
            });
        });
    }

    // ==========================================================================
    // 2. SCROLL HEADER & SCROLL SPY (ACTIVE NAV LINK)
    // ==========================================================================
    const header = document.getElementById('main-header');
    const sections = document.querySelectorAll('section');

    const handleScroll = () => {
        // Sticky Header effect
        if (header) {
            if (window.scrollY > 50) {
                header.classList.add('scroll-nav');
            } else {
                header.classList.remove('scroll-nav');
            }
        }

        // Scroll Spy - Highlight navigation items based on current view position
        let currentSectionId = '';
        const scrollPosition = window.scrollY + 150; // offset

        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.offsetHeight;
            if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                currentSectionId = section.getAttribute('id');
            }
        });

        if (currentSectionId) {
            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === `#${currentSectionId}`) {
                    link.classList.add('active');
                }
            });
        }
    };

    window.addEventListener('scroll', handleScroll);
    handleScroll(); // Trigger initial check

    // ==========================================================================
    // 4. ANIMATING SKILL PROGRESS BARS ON SCROLL
    // ==========================================================================
    const skillsSection = document.getElementById('skills');
    const progressBars = document.querySelectorAll('.progress-bar-fill');

    const animateSkillBars = () => {
        if (!skillsSection) return;

        const sectionTop = skillsSection.getBoundingClientRect().top;
        const windowHeight = window.innerHeight;

        // Trigger animation when the top of skills section reaches 80% of window height
        if (sectionTop < windowHeight * 0.8) {
            progressBars.forEach(bar => {
                const targetWidth = bar.getAttribute('data-width');
                bar.style.width = targetWidth;
            });
            // Remove scroll listener after animating once to save resources
            window.removeEventListener('scroll', animateSkillBars);
        }
    };

    window.addEventListener('scroll', animateSkillBars);
    animateSkillBars(); // Check if section is already in view on load

    // ==========================================================================
    // 5. PROJECT GALLERY FILTERING
    // ==========================================================================
    const filterButtons = document.querySelectorAll('.filter-btn');
    const projectCards = document.querySelectorAll('.project-card');

    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Remove active class from all buttons
            filterButtons.forEach(btn => btn.classList.remove('active'));
            // Add active class to clicked button
            button.classList.add('active');

            const filterValue = button.getAttribute('data-filter');

            projectCards.forEach(card => {
                const cardCategory = card.getAttribute('data-category');
                
                // Animate and display filter
                if (filterValue === 'all' || cardCategory === filterValue) {
                    card.classList.remove('hide');
                    card.style.opacity = '0';
                    setTimeout(() => {
                        card.style.transition = 'opacity 0.4s ease';
                        card.style.opacity = '1';
                    }, 50);
                } else {
                    card.classList.add('hide');
                }
            });
        });
    });

    // ==========================================================================
    // 6. SECURE AJAX CONTACT FORM SUBMISSION (WITH CSRF)
    // ==========================================================================
    const contactForm = document.getElementById('portfolio-contact-form');
    const alertBox = document.getElementById('contact-alert');
    const submitBtn = document.getElementById('submit-message-btn');

    if (contactForm) {
        contactForm.addEventListener('submit', async (e) => {
            e.preventDefault();

            // Reset alert box
            alertBox.style.display = 'none';
            alertBox.className = 'alert-box';
            alertBox.textContent = '';

            // Disable submit button & show loading indicator
            const originalBtnText = submitBtn.innerHTML;
            submitBtn.disabled = true;
            submitBtn.innerHTML = 'Mengirim... <i class="fas fa-spinner fa-spin"></i>';

            // Gather Form Data
            const formData = new FormData(contactForm);
            
            // Get CSRF Token from meta tag
            const csrfTokenElement = document.querySelector('meta[name="csrf-token"]');
            const csrfToken = csrfTokenElement ? csrfTokenElement.getAttribute('content') : '';

            try {
                const response = await fetch(contactForm.action, {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    },
                    body: formData
                });

                const data = await response.json();

                if (response.ok && data.success) {
                    // Show Success Message
                    alertBox.style.display = 'block';
                    alertBox.classList.add('success');
                    alertBox.textContent = data.message;
                    
                    // Reset Form fields
                    contactForm.reset();
                } else {
                    // Show Error Message from backend validation
                    alertBox.style.display = 'block';
                    alertBox.classList.add('error');
                    
                    if (data.errors && Array.isArray(data.errors)) {
                        alertBox.textContent = data.errors.join(' | ');
                    } else if (data.message) {
                        alertBox.textContent = data.message;
                    } else {
                        alertBox.textContent = 'Terjadi kesalahan. Silakan periksa kembali isian Anda.';
                    }
                }
            } catch (error) {
                console.error('Submit Error:', error);
                alertBox.style.display = 'block';
                alertBox.classList.add('error');
                alertBox.textContent = 'Gagal terhubung ke server. Silakan periksa koneksi internet Anda.';
            } finally {
                // Re-enable submit button
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnText;
            }
        });
    }
});
