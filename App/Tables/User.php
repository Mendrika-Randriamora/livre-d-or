<?php

namespace App\Tables;

use Core\Model\Model;

class User extends Model
{
    protected static $table = "users";

    protected static $primary_key = "id";

    protected static $cols_fillable = [
        "name" ,
        "email",
        "password",
        "role"
    ];

    protected static function current_fillable(): array
    {
        return self::$cols_fillable;
    }

    protected static function current_table() : string
    {
        return self::$table;
    }
    
    protected static function current_primary_key(): string
    {
        return self::$primary_key;
    }
}