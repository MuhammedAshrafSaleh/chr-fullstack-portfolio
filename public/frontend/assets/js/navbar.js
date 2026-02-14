// Navbar Functionality

class Navbar {
    constructor() {
        this.navbar = document.getElementById('navbar');
        this.navToggle = document.getElementById('navToggle');
        this.navMenu = document.getElementById('navMenu');
        this.navOverlay = document.getElementById('navOverlay');
        this.navLinks = document.querySelectorAll('.navbar__link');
        this.hero = document.querySelector('.hero') || document.querySelector('section');
        
        this.init();
    }

    init() {
        this.handleScroll();
        this.handleMobileMenu();
        this.handleActiveLinks();
    }

    // Sticky Navbar on Scroll
    handleScroll() {
        window.addEventListener('scroll', () => {
            const scrollPosition = window.scrollY;
            const heroHeight = this.hero ? this.hero.offsetHeight : 600;
            
            if (scrollPosition >= heroHeight - 150) {
                this.navbar.classList.add('sticky');
            } else {
                this.navbar.classList.remove('sticky');
            }
        });
    }

    // Mobile Menu Toggle
    handleMobileMenu() {
        if (!this.navToggle || !this.navMenu || !this.navOverlay) return;

        // Toggle menu on button click
        this.navToggle.addEventListener('click', () => {
            this.toggleMenu();
        });

        // Close menu on overlay click
        this.navOverlay.addEventListener('click', () => {
            this.closeMenu();
        });

        // Close menu on link click (mobile)
        this.navLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth <= 1024) {
                    this.closeMenu();
                }
            });
        });

        // Close menu on ESC key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && this.navMenu.classList.contains('active')) {
                this.closeMenu();
            }
        });
    }

    // Toggle Menu
    toggleMenu() {
        this.navToggle.classList.toggle('active');
        this.navMenu.classList.toggle('active');
        this.navOverlay.classList.toggle('active');
        
        // Prevent body scroll when menu is open
        if (this.navMenu.classList.contains('active')) {
            document.body.style.overflow = 'hidden';
        } else {
            document.body.style.overflow = '';
        }
    }

    // Close Menu
    closeMenu() {
        this.navToggle.classList.remove('active');
        this.navMenu.classList.remove('active');
        this.navOverlay.classList.remove('active');
        document.body.style.overflow = '';
    }

    // Handle Active Link State
    handleActiveLinks() {
        this.navLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                // Remove active class from all links
                this.navLinks.forEach(l => l.classList.remove('navbar__link--active'));
                
                // Add active class to clicked link
                link.classList.add('navbar__link--active');
            });
        });

        // Update active link based on scroll position (optional)
        this.updateActiveLinkOnScroll();
    }

    // Update Active Link Based on Scroll Position
    updateActiveLinkOnScroll() {
        const sections = document.querySelectorAll('section[id]');
        
        if (sections.length === 0) return;

        window.addEventListener('scroll', () => {
            const scrollPosition = window.scrollY + 200;

            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.offsetHeight;
                const sectionId = section.getAttribute('id');

                if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                    this.navLinks.forEach(link => {
                        link.classList.remove('navbar__link--active');
                        
                        if (link.getAttribute('href') === `#${sectionId}`) {
                            link.classList.add('navbar__link--active');
                        }
                    });
                }
            });
        });
    }

    // Smooth Scroll to Section
    smoothScroll() {
        this.navLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                const href = link.getAttribute('href');
                
                if (href.startsWith('#')) {
                    e.preventDefault();
                    const targetId = href.substring(1);
                    const targetSection = document.getElementById(targetId);
                    
                    if (targetSection) {
                        const offsetTop = targetSection.offsetTop - 100;
                        
                        window.scrollTo({
                            top: offsetTop,
                            behavior: 'smooth'
                        });
                    }
                }
            });
        });
    }
}

// Initialize Navbar when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    new Navbar();
});