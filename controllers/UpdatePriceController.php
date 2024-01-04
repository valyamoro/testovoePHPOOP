<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\UpdatePriceModel;

class UpdatePriceController extends Controller
{
    public function updatePrice(Request $request): void
    {
        $updatePriceModel = new UpdatePriceModel(self::getPDO());
        if ($request->isPost()) {
            $id = $_POST['productId'];
            $newPrice = $_POST['newPrice'];

            $updatePriceModel->updatePrice($newPrice, $id);
        }
    }
}