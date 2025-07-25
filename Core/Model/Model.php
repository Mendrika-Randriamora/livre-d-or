<?php

namespace Core\Model;

require_once "./vendor/autoload.php";

use Core\Database\Database;

class Model 
{
    protected static $table = "";

    protected static $primary_key = "id";

    protected static $cols_fillable = [];

    protected static function current_fillable() : array
    {
        return self::$cols_fillable;
    }

    protected static function current_table() : string
    {
        return self::$table;
    }

    protected static function current_primary_key() : string
    {
        return self::$primary_key;
    }

    public static function getFillable() : array
    {
        return static::current_fillable();
    }

    public static function getTable() : string
    {
        return static::current_table();
    }

    public static function getPrimaryKey() : string
    {
        return static::current_primary_key();
    }

    public static function pdo() : ?\PDO
    {
        return Database::connexion();
    }

    public static function add(array $data) : void
    {   

        $table = self::getTable();
        $data = implode("\",\"", $data);
        $cols = implode(",", self::getFillable());

        //die($cols);

        $request = "INSERT INTO " . $table . "(". $cols . ") VALUES (\"". $data . "\")";
        //die($request);
        try {

            $stmt = self::pdo()->query($request);
            
        } catch (\PDOException $th) {
            die($th->getMessage());
        }
    }

    public static function update(string|int $id, array $data) : void
    {

    }

    public static function find(string|int $id) : array
    {
        $table = self::getTable();
        $primary_key = self::getPrimaryKey();

        $request = "SELECT * FROM $table WHERE $primary_key = $id";

        try {
            
            $stmt = self::pdo()->query($request);

            return $stmt->fetch(\PDO::FETCH_ASSOC);

        } catch (\Throwable $th) {
            die($th->getMessage());
        }

    }

    public static function delete(string|int $id) : void
    {
        $table = self::getTable();
        $primary_key = self::getPrimaryKey();

        $request = "DELETE FORM $table WHERE $primary_key = $id";

        try {
            
            $stmt = self::pdo()->query($request);

        } catch (\Throwable $th) {
            die($th->getMessage());
        }
    }

    public static function all() : array
    {
        $table = self::getTable();
        $request = "SELECT * FROM $table";

        try {
            $stmt = self::pdo()->query($request);

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);

        } catch (\PDOException $e) {
            die($e->getMessage());
        }

    }


}

