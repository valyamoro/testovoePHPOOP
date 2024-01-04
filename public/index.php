<?php
declare(strict_types=1);
\error_reporting(-1);
\session_start();

use app\controllers\AddProductController;
use app\controllers\DeleteProductController;
use app\controllers\EditProductController;
use app\controllers\UpdatePriceController;
use app\core\Application;
use app\controllers\SideController;

function dump(mixed $data): void
{
    echo '<pre>';
    \print_r($data);
    echo '</pre>';
}

$itemsDirectory = ['../uploads'];
foreach ($itemsDirectory as $item) {
    if (!\is_dir($item)) {
        \mkdir($item, 0777, true);
    }
}

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Application(\dirname(__DIR__));

$app->router->get('/', [SideController::class, 'home']);

$app->router->get('/addProduct', [AddProductController::class, 'addProduct']);
$app->router->post('/addProduct', [AddProductController::class, 'addProduct']);

$app->router->get('/editProduct', [EditProductController::class, 'editProduct']);
$app->router->post('/editProduct', [EditProductController::class, 'editProduct']);

$app->router->get('/deleteProduct', [DeleteProductController::class, 'deleteProduct']);
$app->router->post('/deleteProduct', [DeleteProductController::class, 'deleteProduct']);

$app->router->post('/updatePrice', [UpdatePriceController::class, 'updatePrice']);

$app->run();
