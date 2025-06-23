/**
 * SageCodex Home Page JavaScript
 * Handles animations, interactions and effects for the home page
 */

document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS animation library with custom settings
    AOS.init({
        duration: 800,
        once: true,
        offset: 100,
        delay: 100,
        easing: 'ease-in-out'
    });
    
    // Add rotation animation to theme toggle button
    const toggleButton = document.querySelector('[data-theme-toggle]');
    if (toggleButton) {
        // Add animation class
        toggleButton.classList.add('transition-transform');
        
        // Add rotation animation on click
        toggleButton.addEventListener('click', function() {
            this.classList.add('rotate-180');
            setTimeout(() => {
                this.classList.remove('rotate-180');
            }, 300);
        });
    }
    
    // Add enhanced UI interactions
    
    // Game icon hover effects
    const gameIcons = document.querySelectorAll('.flex-col.items-center.gap-1');
    gameIcons.forEach(icon => {
        icon.addEventListener('mouseover', function() {
            this.querySelector('.w-12').classList.add('pulse-animation');
        });
        
        icon.addEventListener('mouseout', function() {
            this.querySelector('.w-12').classList.remove('pulse-animation');
        });
    });
    
    // Add counter animation to stats
    const animateCounter = (element, target, duration = 2000) => {
        const start = 0;
        const increment = Math.ceil(target / (duration / 16));
        let current = start;
        
        const updateCount = () => {
            current += increment;
            if (current >= target) {
                element.textContent = target + '+';
                return;
            }
            element.textContent = current + '+';
            requestAnimationFrame(updateCount);
        };
        
        updateCount();
    };
    
    // Trigger counter animations when elements become visible
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                if (entry.target.classList.contains('coaches-count')) {
                    animateCounter(entry.target, 100);
                } else if (entry.target.classList.contains('courses-count')) {
                    animateCounter(entry.target, 250);
                }
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });
    
    // Observe counter elements
    document.querySelectorAll('.gaming-gradient').forEach(el => {
        if (el.textContent.includes('100+')) {
            el.classList.add('coaches-count');
            observer.observe(el);
        } else if (el.textContent.includes('250+')) {
            el.classList.add('courses-count');
            observer.observe(el);
        }
    });
    
    // Add subtle parallax effect to hero image
    const heroImage = document.querySelector('.w-full.object-cover');
    if (heroImage) {
        window.addEventListener('mousemove', (e) => {
            const moveX = (e.clientX - window.innerWidth / 2) * 0.01;
            const moveY = (e.clientY - window.innerHeight / 2) * 0.01;
            heroImage.style.transform = `scale(1.01) translate(${moveX}px, ${moveY}px)`;
        });
    }
}); 