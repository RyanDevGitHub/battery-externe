(function () {
    const swatches = document.querySelectorAll('.color-swatch');
    const selectedVariant = document.querySelector('[data-selected-variant]');
    const variantInputs = document.querySelectorAll('[data-variant-input]');

    swatches.forEach((swatch) => {
        swatch.addEventListener('click', () => {
            swatches.forEach((item) => {
                item.classList.remove('active');
                item.setAttribute('aria-pressed', 'false');
            });

            swatch.classList.add('active');
            swatch.setAttribute('aria-pressed', 'true');

            const variant = swatch.getAttribute('data-variant') || 'Midnight Black';
            if (selectedVariant) {
                selectedVariant.textContent = variant;
            }

            variantInputs.forEach((input) => {
                input.value = variant;
            });
        });
    });
})();
