<?php

namespace app\models;

class UpdatePriceModel extends ProductModel
{
    public function updatePrice($newPrice, $id): bool
    {
        $query = 'UPDATE ' . static::TABLE_NAME . ' SET price=? WHERE id=?';

        $this->builder->prepare($query)->execute([$newPrice, $id]);

        return (bool)$this->builder->rowCount();
    }
}