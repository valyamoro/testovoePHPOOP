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
        $addProductModel = new AddProductModel(self::getPDO());

        if ($request->isPost()) {
            $product = $request->getBody();
            $imagePath = $addProductModel->uploadImage($product['image']);
            $now = \date('Y-m-d H:i:s');
          
            $data = [
                'imagePath' => $imagePath,
                'name' => $product['name'],
                'price' => $product['price'],
                'description' => $product['description'],
                'createdAt' => $now,
                'updatedAt' => $now,
            ];

            $addProductModel->loadData($data);

            if ($addProductModel->validate()) {
                $data = [
                    'image_path' => $addProductModel->imagePath,
                    'name' => $addProductModel->name,
                    'price' => $addProductModel->price,
                    'description' => $addProductModel->description,
                    'created_at' => $addProductModel->createdAt,
                    'updated_at' => $addProductModel->updatedAt,
                ];

                $addProductModel->insert($data);
            }

            return $this->render('addProduct', [
                'model' => $addProductModel,
                'errors' => $addProductModel->errors,
            ]);
        }

        $this->setLayout('main');
        return $this->render('addProduct', [
            'model' => $addProductModel,
        ]);
    }
}
