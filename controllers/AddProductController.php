<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\database\DatabaseConfiguration;
use app\database\DatabasePDOConnection;
use app\database\PDODriver;
use app\models\AddProductModel;
use app\models\ProductModel;

class AddProductController extends Controller
{
    public function addProduct(Request $request): string
    {
        $data = require __DIR__ . '/../config/db.php';
        $databaseConfiguration = new DatabaseConfiguration(...$data['pdo']);
        $databasePDOConnection = new DatabasePDOConnection($databaseConfiguration);
        $pdoDriver = new PDODriver($databasePDOConnection->connection());

        $addProductModel = new AddProductModel($pdoDriver);

        if ($request->isPost()) {
            $addProductModel->loadData($request->getBody());
            if (true) {
                $data = [
//                    'image_path' => $addProductModel->imagePath['name'],
                    'image_path' => '',
                    'name' => $addProductModel->name,
                    'price' => $addProductModel->price,
                    'description' => $addProductModel->description,
                    'created_at' => \date('Y-m-d H:i:s'),
                    'updated_at' => \date('Y-m-d H:i:s'),
                ];
                $addProductModel->insert($data);
            }

            return $this->render('addProduct', [
                'model' => $addProductModel,
            ]);
        }

        $this->setLayout('main');
        return $this->render('addProduct', [
            'model' => $addProductModel,
        ]);
    }
}
