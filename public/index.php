<?php
declare(strict_types=1);

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

$data = require __DIR__ . '/../config/db.php';
$databaseConfiguration = new DatabaseConfiguration(...$data['pdo']);
$databasePDOConnection = new DatabasePDOConnection($databaseConfiguration);
$pdoDriver = new PDODriver($databasePDOConnection->connection());

$model = new ProductModel($pdoDriver);
print_r($model->getAll());

$app = new Application(\dirname(__DIR__));

$app->router->get('/', [SideController::class, 'home']);

$app->run();
