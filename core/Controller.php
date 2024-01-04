<?php

namespace app\core;

use app\database\DatabaseConfiguration;
use app\database\DatabasePDOConnection;
use app\database\PDODriver;

class Controller
{
    public string $layout = 'main';

    public function setLayout(string $layout): void
    {
        $this->layout = $layout;
    }

    public static function render(string $view, array $params = []): string
    {
        return Application::$app->router->renderView($view, $params);
    }

    public static function getPDO(): PDODriver
    {
        $data = require __DIR__ . '/../config/db.php';

        $databaseConfiguration = new DatabaseConfiguration(...$data['pdo']);
        $databasePDOConnection = new DatabasePDOConnection($databaseConfiguration);

        return new PDODriver($databasePDOConnection->connection());
    }

}
