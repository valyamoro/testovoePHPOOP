<?php
declare(strict_types=1);

use app\controllers\AddProductController;
use app\core\Application;
use app\controllers\SideController;
use app\database\DatabaseConfiguration;
use app\database\DatabasePDOConnection;
use app\database\PDODriver;
use app\models\ProductModel;

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

$app->router->get('/addProduct', [AddProductController::class, 'addProduct']);
$app->router->post('/addProduct', [AddProductController::class, 'addProduct']);

$app->run();
