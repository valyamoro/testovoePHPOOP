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

    public function getImageById(int $id): array
    {
        $query = 'SELECT image_path FROM ' . static::TABLE_NAME . ' WHERE id=? LIMIT 1';

        $this->builder->prepare($query)->execute([$id]);

        return $this->builder->fetch();
    }

    public function uploadImage(array $data): string
    {
        // Потом сделать так чтобы папка автоматически создавалась при заходе на сайт.
        $filePath = __DIR__ . '\..\uploads\\' . \uniqid() . $data['name'];

        \move_uploaded_file($data['tmp_name'], $filePath);

        return '\..\\' . \strstr($filePath, 'uploads');
    }

}