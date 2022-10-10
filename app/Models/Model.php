<?php

namespace App\Models;

use App\Kernel\Database\QueryBuilder;

abstract class Model
{
    private array $attributes = [];

    public function __get(string $name): mixed
    {
        return $this->attributes[$name];
    }

    public function __set(string $name, mixed $value)
    {
        $this->attributes[$name] = $value;
    }

    public static function __callStatic(string $name, array $arguments)
    {
        $query = new QueryBuilder(static::$table, static::class);
        $result = $query->$name(...$arguments);

        if ($result instanceof QueryBuilder) {
            return $result;
        }

        return $result;
    }

    public function toArray(): array
    {
        return $this->attributes;
    }

    public function update()
    {
        $query = new QueryBuilder(static::$table);
        $result = $query->updateTable($this->attributes);

        return $this->getById($this->attributes['id']);
    }

    public static function create(array $attributes = [])
    {
        $id = self::save($attributes);

        return self::getById($id);
    }

    public static function setAttributes(array $attributes): Model
    {
        $model = new static();

        foreach ($attributes as $column => $value) {
            $model->attributes[$column] = $value;
        }

        return $model;
    }

    public static function getById(int $id): Model|null
    {
        return self::where('id', '=', $id)->get();
    }
}