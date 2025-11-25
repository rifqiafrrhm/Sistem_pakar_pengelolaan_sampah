import './bootstrap';

document.addEventListener('DOMContentLoaded', function() {
    const options = document.querySelectorAll('.option');
    if (options.length > 0) {
        options.forEach(option => {
            option.addEventListener('click', function() {
                const radio = this.querySelector('input[type="radio"]');
                if (radio) {
                    radio.checked = true;

                    document.querySelectorAll('.option').forEach(opt => {
                        opt.style.borderColor = 'transparent';
                    });
                    this.style.borderColor = 'var(--primary-color)';
                }
            });
        });
    }

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

});
