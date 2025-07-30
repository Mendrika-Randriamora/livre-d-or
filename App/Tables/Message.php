<?php

namespace App\Tables;

require_once "./vendor/autoload.php";

use Core\Model\Model;

class Message extends Model
{
    protected static $table = "messages";

    protected static $primary_key = "id";

    protected static $cols_fillable = [
        "name" ,
        "created_at",
        "message"
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