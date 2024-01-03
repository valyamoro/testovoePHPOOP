<?php

namespace app\controllers;

use app\core\Controller;
use app\database\DatabaseConfiguration;
use app\database\DatabasePDOConnection;
use app\database\PDODriver;
use app\models\ProductModel;

class SideController extends Controller
{
    public static function home(): string
    {
        // Сделать статический метод getPDODriver в Controller, т.к объект не нужен.
        $data = require __DIR__ . '/../config/db.php';
        $databaseConfiguration = new DatabaseConfiguration(...$data['pdo']);
        $databasePDOConnection = new DatabasePDOConnection($databaseConfiguration);
        $pdoDriver = new PDODriver($databasePDOConnection->connection());

        $productModel = new ProductModel($pdoDriver);
        $products = $productModel->getAll();

        return self::render('home', [
            'products' => $products,
        ]);
    }

}