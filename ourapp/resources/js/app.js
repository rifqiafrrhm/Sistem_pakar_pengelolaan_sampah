import './bootstrap';

// Konsultasi System JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Auto-submit on option click untuk halaman konsultasi
    const options = document.querySelectorAll('.option');
    if (options.length > 0) {
        options.forEach(option => {
            option.addEventListener('click', function() {
                const radio = this.querySelector('input[type="radio"]');
                if (radio) {
                    radio.checked = true;

                    // Visual feedback
                    document.querySelectorAll('.option').forEach(opt => {
                        opt.style.borderColor = 'transparent';
                    });
                    this.style.borderColor = 'var(--primary-color)';
                }
            });
        });
    }

    // Smooth scroll untuk navigasi
    const navLinks = document.querySelectorAll('a[href^="#"]');
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            if (targetId !== '#') {
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });

    // Bootstrap components initialization (jika diperlukan)
    // const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    // const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
});
