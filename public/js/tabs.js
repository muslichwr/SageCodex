/**
 * SageCodex Tabs Functionality
 * Handles switching between different tab content sections
 */

document.addEventListener('DOMContentLoaded', function() {
    // Find all tab containers
    const tabContainers = document.querySelectorAll('.tab-container');
    
    tabContainers.forEach(container => {
        // Get tab buttons and content sections within this container
        const tabButtons = container.querySelectorAll('.tab-button');
        const tabContents = container.querySelectorAll('.tab-content');
        
        // Default: activate first tab if no active tab
        if (container.querySelector('.tab-button.active') === null && tabButtons.length > 0) {
            tabButtons[0].classList.add('active');
            
            // Get the target content ID from data-target attribute
            const targetId = tabButtons[0].dataset.target;
            if (targetId) {
                const targetContent = container.querySelector(`#${targetId}`);
                if (targetContent) {
                    // Hide all content sections
                    tabContents.forEach(content => {
                        content.classList.add('hidden');
                    });
                    // Show target content
                    targetContent.classList.remove('hidden');
                }
            }
        }
        
        // Add click event listeners to each tab button
        tabButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Remove active class from all buttons in this container
                tabButtons.forEach(btn => {
                    btn.classList.remove('active');
                    btn.setAttribute('aria-selected', 'false');
                });
                
                // Add active class to clicked button
                button.classList.add('active');
                button.setAttribute('aria-selected', 'true');
                
                // Get the target content ID
                const targetId = button.dataset.target;
                if (targetId) {
                    // Hide all content sections
                    tabContents.forEach(content => {
                        content.classList.add('hidden');
                    });
                    
                    // Show the target content
                    const targetContent = container.querySelector(`#${targetId}`);
                    if (targetContent) {
                        targetContent.classList.remove('hidden');
                    }
                }
            });
        });
    });
    
    // Additional functionality for category tabs if they exist
    const categoryTabs = document.querySelectorAll('.category-tab');
    if (categoryTabs.length > 0) {
        categoryTabs.forEach(tab => {
            tab.addEventListener('click', function() {
                // Remove active class from all category tabs
                categoryTabs.forEach(t => t.classList.remove('active'));
                
                // Add active class to clicked tab
                tab.classList.add('active');
                
                // Get the category value
                const category = tab.dataset.category;
                
                // Get all filterable items
                const items = document.querySelectorAll('.filterable-item');
                
                // Show/hide items based on category
                items.forEach(item => {
                    if (category === 'all' || item.dataset.category === category) {
                        item.classList.remove('hidden');
                    } else {
                        item.classList.add('hidden');
                    }
                });
            });
        });
    }

    // Apply proper styling to the initially active tab
    function initializeActiveTabs() {
        // Find the first tab button or the one marked as active
        const initialActiveTab = document.querySelector('.tab-btn.tab-active') || document.querySelector('.tab-btn:first-child');
        if (initialActiveTab) {
            const activeDiv = initialActiveTab.querySelector('div');
            if (activeDiv) {
                // Apply active styling
                activeDiv.classList.add('bg-brand-primary');
                activeDiv.classList.add('text-white');
                activeDiv.classList.remove('bg-white');
                activeDiv.classList.remove('dark:bg-neutral-dark');
            }
        }
    }

    // Initialize tabs when page loads
    initializeActiveTabs();
});

// Filter function for search functionality
function filterCourses(query) {
    query = query.toLowerCase().trim();
    
    // Get all course cards
    const courseCards = document.querySelectorAll('.course-card');
    let visibleCount = 0;
    
    courseCards.forEach(card => {
        const cardParent = card.closest('.card') || card;
        const title = card.querySelector('h3').textContent.toLowerCase();
        const category = card.querySelector('.text-sm').textContent.toLowerCase();
        
        // Check if the card matches the search query
        if (title.includes(query) || category.includes(query)) {
            cardParent.classList.remove('hidden');
            visibleCount++;
        } else {
            cardParent.classList.add('hidden');
        }
    });
    
    // Update results counter if it exists
    const resultsCounter = document.querySelector('#results-counter');
    if (resultsCounter) {
        resultsCounter.textContent = visibleCount;
    }
    
    // Show/hide empty results message
    const emptyResults = document.querySelector('#empty-results');
    if (emptyResults) {
        if (visibleCount === 0) {
            emptyResults.classList.remove('hidden');
        } else {
            emptyResults.classList.add('hidden');
        }
    }
} 