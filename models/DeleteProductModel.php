<?php

namespace app\models;

class DeleteProductModel extends ProductModel
{
    public function deleteProduct(int $id): bool
    {
        $query = 'DELETE FROM ' . static::TABLE_NAME . ' WHERE id=? LIMIT 1';

        $this->builder->prepare($query)->execute([$id]);
        $result = $this->builder->rowCount();

        return (bool)$result;
    }

}
