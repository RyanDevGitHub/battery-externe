<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;

class OrderSuccessController extends Controller
{
    public function index(): void
    {
        $orderNumber = 'ANKR-' . date('Ymd') . '-' . strtoupper(substr(md5((string) microtime(true)), 0, 6));

        $this->render('order-success', [
            'pageTitle' => 'Order Success',
            'orderNumber' => $orderNumber,
            'pageStyles' => '<link rel="stylesheet" href="/assets/css/checkout.css">',
            'mainClass' => 'checkout-shell',
        ]);
    }
}
