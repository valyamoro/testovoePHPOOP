<?php
declare(strict_types=1);

use app\core\Application;
use app\controllers\SideController;

\error_reporting(-1);
\session_start();

function dump(mixed $data): void
{
    echo '<pre>';
    \print_r($data);
    echo '</pre>';
}

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Application(\dirname(__DIR__));

$app->router->get('/', [SideController::class, 'home']);

$app->run();
