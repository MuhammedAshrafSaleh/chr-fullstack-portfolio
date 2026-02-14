// Initialize Lenis
const lenis = new Lenis({
    lerp: 0.4,
    duration: 2,
    smoothWheel: true,
    wheelMultiplier: 0.7,
    autoRaf: true,
});

// Get elements
const projectsSection = document.querySelector('.projects-horizontal');
const track = document.querySelector('.projects-horizontal__track');
const slides = document.querySelectorAll('.project-slide');

// Calculate the horizontal scroll distance
function calculateScrollHeight() {
    if (!track || !projectsSection) return;
    
    const trackWidth = track.scrollWidth;
    const windowWidth = window.innerWidth;
    const scrollDistance = trackWidth - windowWidth;
    
    // Set the section height to enable vertical scrolling
    projectsSection.style.height = `${scrollDistance + window.innerHeight}px`;
}

// Handle horizontal scroll on vertical scroll
function handleHorizontalScroll() {
    if (!track || !projectsSection) return;
    
    const rect = projectsSection.getBoundingClientRect();
    const sectionTop = rect.top;
    const sectionHeight = rect.height;
    
    // Check if section is in viewport
    if (sectionTop <= 0 && sectionTop > -sectionHeight + window.innerHeight) {
        // Calculate scroll progress within the section
        const scrollProgress = Math.abs(sectionTop) / (sectionHeight - window.innerHeight);
        
        // Calculate horizontal translation
        const trackWidth = track.scrollWidth;
        const windowWidth = window.innerWidth;
        const maxScroll = trackWidth - windowWidth;
        
        const translateX = -scrollProgress * maxScroll;
        
        // Apply transform
        track.style.transform = `translateX(${translateX}px)`;
        
        // Update active slide (optional - for progress dots)
        updateActiveSlide(scrollProgress);
    }
}

// Update active slide indicator (optional)
function updateActiveSlide(progress) {
    const slideCount = slides.length;
    const currentIndex = Math.floor(progress * slideCount);
    
    // You can add visual feedback here
    // For example, update progress dots or slide numbers
}

// Initialize on load
window.addEventListener('load', () => {
    calculateScrollHeight();
    handleHorizontalScroll();
});

// Recalculate on resize
let resizeTimeout;
window.addEventListener('resize', () => {
    clearTimeout(resizeTimeout);
    resizeTimeout = setTimeout(() => {
        calculateScrollHeight();
        handleHorizontalScroll();
    }, 100);
});

// Listen for scroll events
lenis.on('scroll', () => {
    handleHorizontalScroll();
});

// Optional: Add progress bar functionality if you have one
const progressBar = document.querySelector('.progress-bar');
if (progressBar) {
    lenis.on('scroll', (e) => {
        const scrollTop = window.pageYOffset;
        const docHeight = document.documentElement.scrollHeight - window.innerHeight;
        const scrollPercent = (scrollTop / docHeight) * 100;
        progressBar.style.width = scrollPercent + '%';
    });
}

// Optional: Create progress dots
function createProgressDots() {
    const progressContainer = document.createElement('div');
    progressContainer.className = 'projects-horizontal__progress';
    
    slides.forEach((slide, index) => {
        const dot = document.createElement('div');
        dot.className = 'projects-horizontal__progress-dot';
        if (index === 0) dot.classList.add('projects-horizontal__progress-dot--active');
        
        dot.addEventListener('click', () => {
            scrollToSlide(index);
        });
        
        progressContainer.appendChild(dot);
    });
    
    document.body.appendChild(progressContainer);
}

// Scroll to specific slide
function scrollToSlide(index) {
    const slideWidth = window.innerWidth;
    const targetScroll = (index / slides.length) * (projectsSection.offsetHeight - window.innerHeight);
    
    window.scrollTo({
        top: projectsSection.offsetTop + targetScroll,
        behavior: 'smooth'
    });
}
