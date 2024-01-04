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
        $editProductModel = new EditProductModel(self::getPDO());

        if ($request->isPost()) {
            $product = $request->getBody();

            $deletedImagePath = $editProductModel->getImageById($_GET['id'])['image_path'];
            if (!empty($deletedImagePath)) {
                \unlink(__DIR__ . $deletedImagePath);
            }

            $imagePath = $editProductModel->uploadImage($product['image']);

            $data = [
                'imagePath' => $imagePath,
                'name' => $product['name'],
                'price' => $product['price'],
                'description' => $product['description'],
                'updatedAt' => \date('Y-m-d H:i:s'),
            ];

            $editProductModel->loadData($data);

            if (true) {
                $data = [
                    'image_path' => $editProductModel->imagePath,
                    'name' => $editProductModel->name,
                    'price' => $editProductModel->price,
                    'description' => $editProductModel->description,
                    'updated_at' => $editProductModel->updatedAt,
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
