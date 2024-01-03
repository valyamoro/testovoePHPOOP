<?php

namespace app\models;


class EditProductModel extends ProductModel
{
    public function update(array $data, int $id): bool
    {
        $params = \implode(', ', \array_map(function ($key) {
            return "{$key} = :{$key}";
        }, \array_keys($data)));
        $data['id'] = $id;

        $query = 'UPDATE ' . static::TABLE_NAME . ' SET ' . $params . ' WHERE id = :id LIMIT 1';
        $this->builder->prepare($query)->execute($data);

        $result = $this->builder->rowCount();

        return (bool)$result;
    }
}