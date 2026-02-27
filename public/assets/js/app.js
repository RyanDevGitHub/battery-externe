document.querySelectorAll('.faq-question').forEach((button) => {
    button.addEventListener('click', () => {
        const item = button.closest('.faq-item');
        if (!item) {
            return;
        }

        const isOpen = item.classList.contains('open');

        document.querySelectorAll('.faq-item').forEach((faqItem) => {
            faqItem.classList.remove('open');
            const trigger = faqItem.querySelector('.faq-question');
            const answer = faqItem.querySelector('.faq-answer');

            if (trigger) {
                trigger.setAttribute('aria-expanded', 'false');
            }

            if (answer) {
                answer.classList.add('hidden');
            }
        });

        if (!isOpen) {
            item.classList.add('open');
            button.setAttribute('aria-expanded', 'true');
            const answer = item.querySelector('.faq-answer');
            if (answer) {
                answer.classList.remove('hidden');
            }
        }
    });
});
