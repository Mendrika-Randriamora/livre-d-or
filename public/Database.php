<?php

namespace Core\Database;

class Database
{
    protected static $dsn = "sqlite:../Core/Database/database.sqlite";
    /** @var \PDO $pdo */
    protected static $pdo;


    public static function connexion(): ?\PDO
    {
        try {

            if (self::$pdo) return self::$pdo;

            self::$pdo = new \PDO(self::$dsn);

            return self::$pdo;
        } catch (\PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }
}
