// Counter Animation on Scroll

class CounterAnimation {
    constructor() {
        this.counters = document.querySelectorAll('.about__stat-number');
        this.animated = false;
        this.init();
    }

    init() {
        this.observeCounters();
    }

    // Observe when counters come into view
    observeCounters() {
        const observerOptions = {
            threshold: 0.5, // Trigger when 50% of the element is visible
            rootMargin: '0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !this.animated) {
                    this.animated = true;
                    this.animateCounters();
                }
            });
        }, observerOptions);

        // Observe the stats container
        const statsContainer = document.querySelector('.about__stats');
        if (statsContainer) {
            observer.observe(statsContainer);
        }
    }

    // Animate all counters
    animateCounters() {
        this.counters.forEach(counter => {
            this.animateCounter(counter);
        });
    }

    // Animate individual counter
    animateCounter(counter) {
        const target = this.getTargetNumber(counter.textContent);
        const duration = 2000; // Animation duration in milliseconds
        const increment = target / (duration / 16); // 60fps
        let current = 0;

        const updateCounter = () => {
            current += increment;

            if (current < target) {
                counter.textContent = this.formatNumber(Math.floor(current));
                requestAnimationFrame(updateCounter);
            } else {
                counter.textContent = this.formatNumber(target);
            }
        };

        // Start animation with slight delay for each counter
        const index = Array.from(this.counters).indexOf(counter);
        setTimeout(() => {
            counter.textContent = '0';
            requestAnimationFrame(updateCounter);
        }, index * 100);
    }

    // Extract number from text (handles "50+" format)
    getTargetNumber(text) {
        // Remove all non-numeric characters except the number itself
        const cleanText = text.replace(/[^0-9]/g, '');
        return parseInt(cleanText) || 0;
    }

    // Format number back to original format
    formatNumber(num) {
        const counterElement = Array.from(this.counters).find(counter => {
            const originalText = counter.getAttribute('data-target') || counter.textContent;
            return this.getTargetNumber(originalText) === this.getTargetNumber(num.toString());
        });

        if (counterElement) {
            const originalText = counterElement.getAttribute('data-target') || counterElement.textContent;
            
            // Check if original had "+"
            if (originalText.includes('+')) {
                return num + '+';
            }
        }

        return num.toString();
    }

    // Alternative: Easing function for smoother animation
    animateCounterWithEasing(counter) {
        const target = this.getTargetNumber(counter.textContent);
        const duration = 2000;
        const startTime = performance.now();

        const easeOutQuart = (t) => {
            return 1 - Math.pow(1 - t, 4);
        };

        const updateCounter = (currentTime) => {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            const easedProgress = easeOutQuart(progress);
            const current = Math.floor(easedProgress * target);

            counter.textContent = this.formatNumber(current);

            if (progress < 1) {
                requestAnimationFrame(updateCounter);
            } else {
                counter.textContent = this.formatNumber(target);
            }
        };

        const index = Array.from(this.counters).indexOf(counter);
        setTimeout(() => {
            counter.textContent = '0';
            requestAnimationFrame(updateCounter);
        }, index * 100);
    }
}

// Initialize counter animation when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    new CounterAnimation();
});