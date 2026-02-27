<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;

class ProductController extends Controller
{
    public function index(): void
    {
        $cartCount = isset($_SESSION['cart']['quantity']) ? (int) $_SESSION['cart']['quantity'] : 0;

        $this->render('product', [
            'pageTitle' => 'Prime 20K Power Bank',
            'cartCount' => (string) $cartCount,
            'pageScripts' => '<script src="/assets/js/product.js" defer></script>',
        ]);
    }
}
