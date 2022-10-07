<?php

namespace App\Models;

use App\Kernel\Database\QueryBuilder;

abstract class Model
{
    private QueryBuilder $builder;

    private array $attributes = [];

    public function __construct()
    {
        $this->builder = new QueryBuilder(static::$table);
    }

    public function __get(string $name)
    {
        return $this->attributes[$name];
    }

    public static function find(int $id)
    {
        $query = new QueryBuilder(static::$table);
        $result = $query->getByid($id);

        $model = new static();

        foreach ($result as $key => $value) {
            $model->attributes[$key] = $value;
        }

        return $model;
    }
}