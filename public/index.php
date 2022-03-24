<?php
declare(strict_types=1);

require_once '../vendor/autoload.php';

use Core\Application;

$app = new Application();

$app->boot()
    ->start()
    ->finish();
