<?php

declare(strict_types=1);

session_start();

// Simple class loading for this project structure.
require_once __DIR__ . '/../app/Core/Router.php';
require_once __DIR__ . '/../app/Core/Controller.php';
require_once __DIR__ . '/../app/Controllers/HomeController.php';
require_once __DIR__ . '/../app/Controllers/ProductController.php';
require_once __DIR__ . '/../app/Controllers/CartController.php';
require_once __DIR__ . '/../app/Controllers/CheckoutController.php';
require_once __DIR__ . '/../app/Controllers/OrderSuccessController.php';

use App\Core\Router;
use App\Controllers\CartController;
use App\Controllers\CheckoutController;
use App\Controllers\HomeController;
use App\Controllers\OrderSuccessController;
use App\Controllers\ProductController;

$router = new Router();

// Route definitions.
$router->get('/', [HomeController::class, 'index']);
$router->get('/product', [ProductController::class, 'index']);
$router->get('/cart', [CartController::class, 'index']);
$router->post('/cart/add', [CartController::class, 'add']);
$router->post('/cart/update', [CartController::class, 'update']);
$router->get('/checkout', [CheckoutController::class, 'index']);
$router->get('/order-success', [OrderSuccessController::class, 'index']);

// Dispatch request to the matching controller action.
$router->dispatch($_SERVER['REQUEST_METHOD'] ?? 'GET', $_SERVER['REQUEST_URI'] ?? '/');
