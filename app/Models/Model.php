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

    public function toArray(): array
    {
        return $this->attributes;
    }

    public function save(): Model|false
    {
        $query = new QueryBuilder(static::$table);

        $result = $query->insert($this->attributes);

        if (!$result) {
            return false;
        }

        return self::getById($result);
    }

    public function update()
    {
        $query = new QueryBuilder(static::$table);
        $result = $query->updateTable($this->attributes);

        return $this->getById($this->attributes['id']);
    }

    public static function create(array $attributes = [])
    {
        return self::setAttributes($attributes)->save();
    }

    private static function setAttributes(array $attributes): Model
    {
        $model = new static();

        foreach ($attributes as $column => $value) {
            $model->attributes[$column] = $value;
        }

        return $model;
    }

    public static function getById(int $id): Model|null
    {
        $results = (new QueryBuilder(static::$table))->where('id', '=', $id)->get();

        if (count($results) < 1) {
            return null;
        }

        return self::setAttributes($results[0]);
    }

    public static function all(): array
    {
        $results = (new QueryBuilder(static::$table))->get();

        $collection = [];

        foreach ($results as $result) {
            $collection[] = self::setAttributes($result);
        }

        return $collection;
    }

    public static function where(string $column, string $operator, string $value): Model|array|null
    {
        $results = (new QueryBuilder(static::$table))->where($column, $operator, $value)->get();

        if (count($results) < 1) {
            return null;
        }

        if (count($results) > 1) {
            $collection = [];

            foreach ($results as $result) {
                $collection[] = self::setAttributes($result);
            }

            return $collection;
        }

        return self::setAttributes($results[0]);
    }
}