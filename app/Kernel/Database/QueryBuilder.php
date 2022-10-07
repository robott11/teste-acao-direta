<?php

namespace App\Kernel\Database;

use PDO;

class QueryBuilder extends DatabaseConnection
{
    private string $table;

    private string $select;

    private string $where;

    private string $sql;

    public function __construct(string $table)
    {
        $this->table = $table;
    }

    public function execute(array $args = [])
    {
        $smt = self::$db->prepare($this->sql);

        foreach ($args as $column => $value) {
            $smt->bindValue($column, $value);
        }

        $smt->execute();

        return $smt->fetch(PDO::FETCH_ASSOC);
    }

    public function getByid(int $id)
    {
        $this->select = 'SELECT * ';
        $this->where = 'WHERE id = :id';
        $this->sql = $this->select . 'FROM ' . $this->table . ' ' . $this->where;

        return $this->execute(['id' => $id]);
    }

    public function getAll()
    {
        $this->select = 'SELECT * ';
        return $this->execute();
    }
}