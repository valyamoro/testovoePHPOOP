<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\database\DatabaseConfiguration;
use app\database\DatabasePDOConnection;
use app\database\PDODriver;
use app\models\EditProductModel;

class EditProductController extends Controller
{
    public function editProduct(Request $request): string
    {
        $data = require __DIR__ . '/../config/db.php';
        $databaseConfiguration = new DatabaseConfiguration(...$data['pdo']);
        $databasePDOConnection = new DatabasePDOConnection($databaseConfiguration);
        $pdoDriver = new PDODriver($databasePDOConnection->connection());

        $editProductModel = new EditProductModel($pdoDriver);

        if ($request->isPost()) {
            $editProductModel->loadData($request->getBody());
            if (true) {
                $data = [
                    'image_path' => '',
                    'name' => $editProductModel->name,
                    'price' => $editProductModel->price,
                    'description' => $editProductModel->description,
                    'updated_at' => \date('Y-m-d H:i:s'),
                ];

                $editProductModel->update($data, $_GET['id']);
            }

            return $this->render('editProduct', [
                'model' => $editProductModel,
            ]);
        }
        $this->setLayout('main');
        return $this->render('editProduct', [
            'model' => $editProductModel,
        ]);
    }
}
