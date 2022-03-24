<?php
declare(strict_types=1);

namespace App\Controllers;

use Core\Utility\View;

class IndexController
{

    /**
     * @return string
     */
    public function index(): string
    {
        return View::render('app');
    }
}