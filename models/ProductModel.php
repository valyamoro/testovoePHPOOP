<?php

namespace app\models;

use app\core\Model;
use app\database\PDODriver;

class ProductModel extends Model
{
    const TABLE_NAME = 'table_name';
    public function __construct(
        protected PDODriver $builder,
    ) {}
    public function getAll(): array
    {
        $query = 'SELECT * FROM ' . static::TABLE_NAME;

        return $this->builder->prepare($query)->execute()->fetchAll();
    }

    public function rules(): array
    {
        return [];
    }
}