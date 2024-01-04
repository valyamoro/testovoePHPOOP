<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\database\DatabaseConfiguration;
use app\database\DatabasePDOConnection;
use app\database\PDODriver;
use app\models\DeleteProductModel;

class DeleteProductController extends Controller
{
    public function deleteProduct(Request $request): void
    {
        $deleteProductModel = new DeleteProductModel(self::getPDO());

        $deletedImagePath = $deleteProductModel->getImageById($_GET['id'])['image_path'];
        if (!empty($deletedImagePath)) {
            \unlink(__DIR__ . $deletedImagePath);
        }

        $deleteProductModel->deleteProduct($_GET['id']);

        \header('Location: /');
    }

}
