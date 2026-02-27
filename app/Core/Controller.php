<?php

declare(strict_types=1);

namespace App\Core;

/**
 * Base controller with a simple view renderer.
 */
abstract class Controller
{
    /**
     * Render an HTML view inside the global layout.
     *
     * @param array<string, string> $data
     */
    protected function render(string $view, array $data = []): void
    {
        $viewsPath = __DIR__ . '/../Views/';

        $defaults = [
            'pageTitle' => 'Projet MVC',
            'pageStyles' => '',
            'pageScripts' => '',
            'mainClass' => 'container',
        ];

        $data = array_merge($defaults, $data);

        $viewContent = file_get_contents($viewsPath . $view . '.html') ?: '';
        $layoutContent = file_get_contents($viewsPath . 'layout.html') ?: '';

        foreach ($data as $key => $value) {
            $viewContent = str_replace('{{' . $key . '}}', $value, $viewContent);
            $layoutContent = str_replace('{{' . $key . '}}', $value, $layoutContent);
        }

        echo str_replace('{{content}}', $viewContent, $layoutContent);
    }
}
