<?php

namespace App\Kernel\Database;

use PDO;
use PDOException;

class DatabaseConnection
{
    protected static PDO $db;

    public static function init()
    {
        $dsn = 'mysql:dbname=' . config('DB_NAME') . ';host=' . config('DB_HOST') . ';port=' . config('DB_PORT');
        $user = config('DB_USER');
        $password = config('DB_PWD');

        try {
            self::$db = new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            echo 'DATABASE ERROR: ' . $e->getMessage();
            exit;
        }
    }
}