/**
 * SageCodex Main JavaScript File
 * Contains general functionality used across the platform
 */

document.addEventListener('DOMContentLoaded', () => {
    // Handle tabs functionality
    const initTabs = () => {
        const tabButtons = document.querySelectorAll('.tab-btn');
        if (tabButtons.length) {
            tabButtons.forEach(button => {
                button.addEventListener('click', () => {
                    // Remove active class from all buttons
                    tabButtons.forEach(btn => btn.classList.remove('active', 'bg-blue-500', 'text-white'));
                    
                    // Add active class to clicked button
                    button.classList.add('active', 'bg-blue-500', 'text-white');
                    
                    // Hide all tab content
                    document.querySelectorAll('.tab-content').forEach(content => {
                        content.classList.add('hidden');
                    });
                    
                    // Show target content
                    const targetId = button.dataset.target;
                    if (targetId) {
                        const targetContent = document.getElementById(targetId);
                        if (targetContent) {
                            targetContent.classList.remove('hidden');
                        }
                    }
                });
            });
        }
    };
    
    // Handle game filter navigation
    const initGameFilter = () => {
        const gameFilterItems = document.querySelectorAll('nav ul li.group');
        if (gameFilterItems.length) {
            gameFilterItems.forEach(item => {
                item.addEventListener('click', (e) => {
                    e.preventDefault();
                    
                    // Remove active class from all items
                    gameFilterItems.forEach(navItem => navItem.classList.remove('active'));
                    
                    // Add active class to clicked item
                    item.classList.add('active');
                    
                    // Here we would typically filter content based on selection
                    // For this example, we're just logging the selection
                    console.log('Game filter selected:', item.textContent.trim());
                });
            });
        }
    };
    
    // Initialize search highlight animation
    const initSearchHighlight = () => {
        const highlightedItems = document.querySelectorAll('.search-highlight');
        if (highlightedItems.length) {
            // Apply staggered animation to each highlighted item
            highlightedItems.forEach((item, index) => {
                setTimeout(() => {
                    item.classList.add('animate-pulse');
                    
                    // Remove animation after a few seconds
                    setTimeout(() => {
                        item.classList.remove('animate-pulse');
                    }, 2000);
                }, index * 200);
            });
        }
    };
    
    // Run initializations
    initTabs();
    initGameFilter();
    initSearchHighlight();
    
    // Global event listeners for dynamic content
    document.addEventListener('contentLoaded', () => {
        // Re-initialize components if content is dynamically loaded
        initTabs();
        initGameFilter();
    });
});

/**
 * SageCodex Course Catalog JavaScript
 * Provides functionality for tab switching and dropdown interactions
 */

document.addEventListener('DOMContentLoaded', () => {
  // Tab functionality
  initTabs();

  // Profile dropdown functionality
  initProfileDropdown();
});

/**
 * Initialize the profile dropdown
 */
function initProfileDropdown() {
  const dropdownButton = document.getElementById('dropdown-opener');
  const dropdown = document.getElementById('dropdown');
  
  if (dropdownButton && dropdown) {
    // Toggle dropdown on button click
    dropdownButton.addEventListener('click', (e) => {
      e.stopPropagation();
      dropdown.classList.toggle('hidden');
    });
    
    // Close dropdown when clicking elsewhere
    document.addEventListener('click', (e) => {
      if (!dropdown.contains(e.target) && !dropdownButton.contains(e.target)) {
        dropdown.classList.add('hidden');
      }
    });
  }
}

/**
 * Add hover effects to course cards
 */
function enhanceCardInteractions() {
  const cards = document.querySelectorAll('.hover-scale');
  
  cards.forEach(card => {
    card.addEventListener('mouseenter', () => {
      card.style.transform = 'scale(1.03)';
      card.style.boxShadow = '0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04)';
    });
    
    card.addEventListener('mouseleave', () => {
      card.style.transform = 'scale(1)';
      card.style.boxShadow = 'none';
    });
  });
}

// Initialize card hover effects
enhanceCardInteractions(); 