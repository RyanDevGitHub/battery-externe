(function () {
    const form = document.getElementById('checkout-form');
    const message = document.getElementById('confirm-message');
    const successLink = document.getElementById('success-link');

    if (!form || !message || !successLink) {
        return;
    }

    form.addEventListener('submit', (event) => {
        event.preventDefault();
        message.textContent = 'Paiement simulé: commande validée. Vous pouvez afficher la confirmation.';
        successLink.style.display = 'inline-flex';
    });
})();
