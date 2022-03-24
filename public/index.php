<?php
declare(strict_types=1);

define('ROOT_PATH', dirname(__DIR__) . DIRECTORY_SEPARATOR);

use Core\Application;

require_once ROOT_PATH . 'vendor/autoload.php';

$app = new Application();

try {
    $app->boot()
        ->start()
        ->finish();
} catch (Exception $e) {
    echo 'error 500';
}
