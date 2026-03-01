<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;

class HomeController extends Controller
{
    /**
     * Display home page.
     */
    public function index(): void
    {
        $this->render('home', [
            'pageTitle' => 'Accueil',
            'mainClass' => '',
        ]);
    }
}
