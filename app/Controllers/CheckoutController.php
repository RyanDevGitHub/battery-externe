<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;

class CheckoutController extends Controller
{
    public function index(): void
    {
        $cart = $_SESSION['cart'] ?? ['quantity' => 0, 'variant' => 'Midnight Black'];
        $quantity = max(0, (int) ($cart['quantity'] ?? 0));
        $price = 129.99;

        $this->render('checkout', [
            'pageTitle' => 'Checkout',
            'cartCount' => (string) $quantity,
            'quantity' => (string) $quantity,
            'variant' => (string) ($cart['variant'] ?? 'Midnight Black'),
            'subtotal' => number_format($quantity * $price, 2),
            'pageStyles' => '<link rel="stylesheet" href="/assets/css/checkout.css">',
            'pageScripts' => '<script src="/assets/js/checkout.js" defer></script>',
            'mainClass' => 'checkout-shell',
        ]);
    }
}
