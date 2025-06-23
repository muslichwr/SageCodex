/**
 * SageCodex Dark Mode Handler
 * Manages theme switching and persists user preference in local storage
 */

document.addEventListener('DOMContentLoaded', function() {
    // Toggle button functionality
    const toggleButton = document.querySelector('[data-theme-toggle]');
    const moonIcon = document.querySelector('[data-icon="moon"]');
    const sunIcon = document.querySelector('[data-icon="sun"]');
    
    if (toggleButton && moonIcon && sunIcon) {
        toggleButton.addEventListener('click', function() {
            document.body.classList.toggle('dark');
            document.body.classList.add('theme-transition');
            moonIcon.classList.toggle('hidden');
            sunIcon.classList.toggle('hidden');
            
            // Save preference to localStorage
            if (document.body.classList.contains('dark')) {
                localStorage.setItem('theme', 'dark');
            } else {
                localStorage.setItem('theme', 'light');
            }
        });
        
        // Check for saved theme preference or system preference
        const savedTheme = localStorage.getItem('theme');
        const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        
        if (savedTheme === 'dark' || (savedTheme === null && prefersDark)) {
            document.body.classList.add('dark');
            moonIcon.classList.add('hidden');
            sunIcon.classList.remove('hidden');
        }
    }
}); 