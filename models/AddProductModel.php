<?php

namespace app\models;

use app\database\PDODriver;

class AddProductModel extends ProductModel
{
    public function insert(array $data): int
    {
        $placeHolders = \str_repeat('?, ', \count($data) - 1) . '?';

        $query = 'insert into ' . static::TABLE_NAME . '( ' . \implode(', ',
                \array_keys($data)) . ') values (' . $placeHolders . ')';

        $this->builder->prepare($query)->execute(\array_values($data));

        return $this->builder->lastInsertId();
    }

    public function uploadImage(array $data): string
    {
        // Потом сделать так чтобы папка автоматически создавалась при заходе на сайт.
        $filePath = __DIR__ . '\..\uploads\\' . \uniqid() . $data['name'];

        \move_uploaded_file($data['tmp_name'], $filePath);

        return '\..\\' . \strstr($filePath, 'uploads');
    }

}
