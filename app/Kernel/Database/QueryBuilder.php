<?php

namespace App\Kernel\Database;

use PDO;
use PDOStatement;

class QueryBuilder extends DatabaseConnection
{
    private string $table;

    private string $model;

    private string $sql = '';

    private string $wheres = '';

    private string $order = '';

    public function __construct(string $table, string $model)
    {
        $this->table = $table;
        $this->model = $model;
    }

    private function execute(): PDOStatement|null
    {
        $query = self::$db->prepare($this->sql);
        $query->execute();

        if ($query->rowCount() < 0) {
            return null;
        }

        return $query;
    }

    public function updateTable(array $attributes): PDOStatement
    {
        if (!isset($attributes['id'])) {
            return false;
        }

        $this->where('id', '=', $attributes['id']);
        unset($attributes['id']);

        $setData = '';
        foreach ($attributes as $key => $value) {
            if ($key == array_key_last($attributes)) {
                $setData .= $key . " = '" . $value . "' ";
                break;
            }
            $setData .= $key . " = '" . $value . "', ";
        }

        $this->sql = 'UPDATE ' . $this->table . ' SET ' . $setData . $this->wheres;
        return $this->execute();
    }

    public function save(array $attributes)
    {
        $columns = implode(', ', array_keys($attributes));

        $values = array_map(function ($val) {
            if (is_bool($val)) {
                return $val;
            }
            return "'" . $val . "'";
        }, array_values($attributes));

        $values = implode(', ', $values);

        $this->sql = 'INSERT INTO ' . $this->table . ' (' . $columns . ') VALUES (' . $values . ')';

        $query = self::$db->prepare($this->sql);

        if (!$query->execute()) {
            return false;
        }

        return self::$db->lastInsertId();
    }

    public function get()
    {
        $this->sql = 'SELECT * FROM ' . $this->table . ' ' . $this->wheres . ' ' . $this->order;

        return $this->setModel(
            $this->execute()->fetchAll(PDO::FETCH_ASSOC)
        );
    }

    public function where(string $column, string $operator, string $value): QueryBuilder
    {
        if (!empty($this->wheres)) {
            $this->wheres .= ' AND ';
        }

        $this->wheres = 'WHERE ' . $column . ' ' . $operator . ' "' . $value . '"';

        return $this;
    }

    public function orderBy(string $column, string $order = 'DESC'): QueryBuilder
    {
        $this->order = 'ORDER BY ' . $column . ' ' . $order;

        return $this;
    }

    private function setModel(array $result)
    {
        if (count($result) > 1) {
            $models = [];

            foreach ($result as $item) {
                $models[] = $this->model::setAttributes($item);
            }

            return $models;
        }

        if (empty($result)) {
            return null;
        }

        return $this->model::setAttributes($result[0]);
    }
}