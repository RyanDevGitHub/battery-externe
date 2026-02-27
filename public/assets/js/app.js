document.querySelectorAll('.faq-question').forEach((button) => {
    button.addEventListener('click', () => {
        const item = button.closest('.faq-item');
        const isOpen = item.classList.contains('open');

        document.querySelectorAll('.faq-item').forEach((faqItem) => {
            faqItem.classList.remove('open');
            const trigger = faqItem.querySelector('.faq-question');
            if (trigger) {
                trigger.setAttribute('aria-expanded', 'false');
            }
        });

        if (!isOpen) {
            item.classList.add('open');
            button.setAttribute('aria-expanded', 'true');
        }
    });
});
