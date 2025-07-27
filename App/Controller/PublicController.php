<?php

namespace App\Controller;

use App\Tables\Message;
use Core\Route;

require_once "./vendor/autoload.php";

class PublicController 
{
    public static function index()
    {
        return function() 
        {
            require_once "./views/index.php";
            require_once "./elements/layout.php";
        };
    }
}