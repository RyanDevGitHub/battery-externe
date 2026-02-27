<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;

class CartController extends Controller
{
    /**
     * @var array<string, string>
     */
    private array $product = [
        'name' => 'Prime 20K Power Bank',
        'price' => '129.99',
    ];

    public function index(): void
    {
        $cart = $this->getCart();
        $quantity = (int) $cart['quantity'];
        $price = (float) $this->product['price'];
        $subtotal = $price * $quantity;

        $this->render('cart', [
            'pageTitle' => 'Cart',
            'cartCount' => (string) $quantity,
            'productName' => $this->product['name'],
            'variant' => $cart['variant'],
            'quantity' => (string) $quantity,
            'price' => number_format($price, 2),
            'subtotal' => number_format($subtotal, 2),
            'pageStyles' => '<link rel="stylesheet" href="/assets/css/cart.css">',
            'mainClass' => 'checkout-shell',
        ]);
    }

    public function add(): void
    {
        $cart = $this->getCart();
        $cart['quantity']++;

        $variant = trim((string) ($_POST['variant'] ?? 'Midnight Black'));
        if ($variant !== '') {
            $cart['variant'] = $variant;
        }

        $_SESSION['cart'] = $cart;

        $redirect = (string) ($_POST['redirect'] ?? '/cart');
        header('Location: ' . $redirect, true, 303);
        exit;
    }

    public function update(): void
    {
        $cart = $this->getCart();
        $direction = (string) ($_POST['direction'] ?? '');

        if ($direction === 'inc') {
            $cart['quantity']++;
        }

        if ($direction === 'dec') {
            $cart['quantity'] = max(0, $cart['quantity'] - 1);
        }

        $_SESSION['cart'] = $cart;

        header('Location: /cart', true, 303);
        exit;
    }

    /**
     * @return array{quantity: int, variant: string}
     */
    private function getCart(): array
    {
        $cart = $_SESSION['cart'] ?? [
            'quantity' => 0,
            'variant' => 'Midnight Black',
        ];

        return [
            'quantity' => max(0, (int) ($cart['quantity'] ?? 0)),
            'variant' => (string) ($cart['variant'] ?? 'Midnight Black'),
        ];
    }
}
