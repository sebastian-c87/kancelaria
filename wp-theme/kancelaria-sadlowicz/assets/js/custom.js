// ============================================
// CUSTOM JAVASCRIPT - KANCELARIA KAMILA SADŁOWICZ
// ============================================

document.addEventListener('DOMContentLoaded', function() {
    
    // --- MOBILE MENU TOGGLE ---
    const hamburger = document.getElementById('hamburger');
    const navMenu   = document.getElementById('navMenu');

    function closeMenu() {
        navMenu.classList.remove('open');
        hamburger.classList.remove('open');
    }

    if (hamburger && navMenu) {
        hamburger.addEventListener('click', function(e) {
            e.stopPropagation();
            navMenu.classList.toggle('open');
            hamburger.classList.toggle('open');
        });

        // Close menu when clicking on a link
        navMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', closeMenu);
        });

        // Close menu when clicking outside
        document.addEventListener('click', function(e) {
            if (navMenu.classList.contains('open') && !navMenu.contains(e.target) && !hamburger.contains(e.target)) {
                closeMenu();
            }
        });
    }

    // --- SMOOTH SCROLLING ---
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href !== '#' && href !== '') {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });

    // --- NAVBAR SCROLL EFFECT ---
    const navbar = document.querySelector('.navbar');
    let lastScroll = 0;

    window.addEventListener('scroll', () => {
        const currentScroll = window.pageYOffset;
        
        if (currentScroll > 100) {
            navbar.style.boxShadow = '0 4px 20px rgba(0,0,0,0.12)';
        } else {
            navbar.style.boxShadow = '0 2px 15px rgba(0,0,0,0.08)';
        }

        lastScroll = currentScroll;
    });

    // --- ANIMATION ON SCROLL ---
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    // Apply to cards and sections
    const animatedElements = document.querySelectorAll('.nav-card, .pillar-card, .spec-card, .offer-card, .blog-card');
    animatedElements.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(el);
    });

    // --- POLISH ORPHAN PREVENTION (sieroty) ---
    // Adds non-breaking space after single-letter Polish prepositions/conjunctions
    // so they never stay alone at the end of a line.
    (function() {
        var SKIP = new Set(['SCRIPT','STYLE','PRE','CODE','TEXTAREA','INPUT','SELECT','BUTTON']);
        var walker = document.createTreeWalker(document.body, NodeFilter.SHOW_TEXT, {
            acceptNode: function(n) {
                return SKIP.has(n.parentElement && n.parentElement.tagName)
                    ? NodeFilter.FILTER_REJECT
                    : NodeFilter.FILTER_ACCEPT;
            }
        });
        var nodes = [];
        while (walker.nextNode()) nodes.push(walker.currentNode);
        nodes.forEach(function(n) {
            var fixed = n.nodeValue.replace(/(^|[\s,;:!?([])([wziaoueWZIAOUE]) /g, '$1$2 ');
            if (fixed !== n.nodeValue) n.nodeValue = fixed;
        });
    })();

    // --- FORM VALIDATION (for future contact form) ---
    const contactForm = document.querySelector('#contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const name = this.querySelector('[name="name"]').value;
            const email = this.querySelector('[name="email"]').value;
            const message = this.querySelector('[name="message"]').value;

            if (!name || !email || !message) {
                alert('Proszę wypełnić wszystkie pola formularza.');
                return;
            }

            if (!validateEmail(email)) {
                alert('Proszę podać prawidłowy adres email.');
                return;
            }

            // Form submission logic here
            console.log('Form submitted:', { name, email, message });
        });
    }

    function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }

});

// --- BACK TO TOP BUTTON (optional) ---
window.addEventListener('scroll', function() {
    const backToTop = document.querySelector('.back-to-top');
    if (backToTop) {
        if (window.pageYOffset > 300) {
            backToTop.style.display = 'block';
        } else {
            backToTop.style.display = 'none';
        }
    }
});
