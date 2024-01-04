<?php

namespace app\models;

use app\core\Model;
use app\database\PDODriver;

class ProductModel extends Model
{
    const TABLE_NAME = 'products';

    public string $imagePath;
    public int $id;
    public string $name;
    public string|int $price;
    public string $description;
    public string $createdAt;
    public string $updatedAt;

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
        return [
            'imagePath' => [self::RULE_REQUIRED],
            'name' => [self::RULE_REQUIRED],
            'price' => [self::RULE_REQUIRED],
            'description' => [self::RULE_REQUIRED],
        ];
    }

}
