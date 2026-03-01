<?php

declare(strict_types=1);

namespace App\Core;

/**
 * Minimal router for GET and POST routes.
 */
class Router
{
    /**
     * @var array<string, array<string, array{0: string, 1: string}>>
     */
    private array $routes = [];

    /**
     * Register a GET route.
     *
     * @param array{0: string, 1: string} $action
     */
    public function get(string $path, array $action): void
    {
        $this->routes['GET'][$path] = $action;
    }

    /**
     * Register a POST route.
     *
     * @param array{0: string, 1: string} $action
     */
    public function post(string $path, array $action): void
    {
        $this->routes['POST'][$path] = $action;
    }

    /**
     * Match current URI and execute controller action.
     */
    public function dispatch(string $method, string $uri): void
    {
        $path = parse_url($uri, PHP_URL_PATH) ?: '/';

        $action = $this->routes[$method][$path] ?? null;

      if ($action === null) {
    http_response_code(404);
    require __DIR__ . '/../Views/404.html';
    exit;
}
        [$controllerClass, $controllerMethod] = $action;
        $controller = new $controllerClass();
        $controller->{$controllerMethod}();
    }
}
