/**
 * SageCodex Course Navigation Accordion
 * Handles expanding and collapsing of course sections in the sidebar
 */

$(document).ready(function() {
    // Initialize accordion by showing the active section (if any)
    initializeAccordion();

    // Add click handlers for accordion buttons
    $('.accordion button').on('click', function() {
        const targetId = $(this).data('expand');
        toggleAccordion(targetId, $(this));
    });
    
    /**
     * Initialize the accordion state on page load
     */
    function initializeAccordion() {
        // Check if any lessons have the 'active' class and expand their parent section
        const activeLesson = $('.lesson-item.active');
        if (activeLesson.length) {
            const parentAccordion = activeLesson.closest('.accordion');
            const parentButton = parentAccordion.find('button');
            const targetId = parentButton.data('expand');
            
            // Expand this section without animation
            $('#' + targetId).show();
            parentButton.find('i').addClass('rotate-180');
        }
    }
    
    /**
     * Toggle the specified accordion section
     * @param {string} targetId - The ID of the target element to toggle
     * @param {jQuery} button - The button that was clicked
     */
    function toggleAccordion(targetId, button) {
        const target = $('#' + targetId);
        const icon = button.find('i');
        
        // Toggle the target element's visibility
        if (target.is(':visible')) {
            target.slideUp(300);
            icon.removeClass('rotate-180');
        } else {
            target.slideDown(300);
            icon.addClass('rotate-180');
        }
    }
}); 