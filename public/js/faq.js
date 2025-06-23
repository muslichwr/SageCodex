document.addEventListener('DOMContentLoaded', function() {
    const faqButtons = document.querySelectorAll('.faq-button');
    
    faqButtons.forEach(button => {
        button.addEventListener('click', function() {
            const faqItem = this.closest('.faq-item');
            const answer = faqItem.querySelector('.faq-answer');
            const icon = this.querySelector('.fa-chevron-down');
            
            // Toggle the current FAQ
            answer.classList.toggle('hidden');
            icon.classList.toggle('transform');
            icon.classList.toggle('rotate-180');
            
            // Add active styling
            faqItem.classList.toggle('border-brand-primary');
            
            // Close other FAQs (Accordion behavior)
            faqButtons.forEach(otherButton => {
                if (otherButton !== button) {
                    const otherFaqItem = otherButton.closest('.faq-item');
                    const otherAnswer = otherFaqItem.querySelector('.faq-answer');
                    const otherIcon = otherButton.querySelector('.fa-chevron-down');
                    
                    otherAnswer.classList.add('hidden');
                    otherIcon.classList.remove('rotate-180');
                    otherFaqItem.classList.remove('border-brand-primary');
                }
            });
        });
    });
}); 