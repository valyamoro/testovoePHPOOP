<?php

use app\database\DatabaseConfiguration;
use app\database\DatabasePDOConnection;
use app\database\PDODriver;
use app\models\AddProductModel;
use PHPUnit\Framework\TestCase;

class AddProductTest extends TestCase
{
    public function testLoadProduct(): void
    {
        $data = [
            'name' => 'product_name1',
            'description' => 'description product number one',
            'price' => '500',
        ];
        print_r($data);
        $data = require __DIR__ . '/../config/db.php';
        $databaseConfiguration = new DatabaseConfiguration(...$data['pdo']);
        $databasePDOConnection = new DatabasePDOConnection($databaseConfiguration);
        $pdoDriver = new PDODriver($databasePDOConnection->connection());

        $addProductModel = new AddProductModel($pdoDriver);
        $addProductModel->loadData($data);

        var_dump($addProductModel);
//        $this->assertSame($addProductModel->name, $data['name']);
//        $this->assertSame($addProductModel->description, $data['description']);
//        $this->assertSame($addProductModel->price, $data['price']);
    }
}