<?php

namespace App\Controller;

use App\Tables\Message;
use Core\Route;
use Core\View;

require_once "./../vendor/autoload.php";

class PublicController
{
    public static function index()
    {
        return function () {
            View::render('index');
        };
    }
}
