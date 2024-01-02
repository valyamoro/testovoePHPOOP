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

}
