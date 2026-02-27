<?php

declare(strict_types=1);

// Simple class loading for this project structure.
require_once __DIR__ . '/../app/Core/Router.php';
require_once __DIR__ . '/../app/Core/Controller.php';
require_once __DIR__ . '/../app/Controllers/HomeController.php';

use App\Core\Router;
use App\Controllers\HomeController;

$router = new Router();

// Route definitions.
$router->get('/', [HomeController::class, 'index']);

// Dispatch request to the matching controller action.
$router->dispatch($_SERVER['REQUEST_METHOD'] ?? 'GET', $_SERVER['REQUEST_URI'] ?? '/');
