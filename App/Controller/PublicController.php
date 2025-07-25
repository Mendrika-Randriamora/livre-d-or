<?php

namespace App\Controller;

use App\Tables\Message;

class PublicController 
{
    public static function index() : \Closure
    { 
        return function()
        {
            $messages = Message::all();
            require_once "./views/allMessage.php";
            require_once "./elements/layout.php"; 
        };
    }

    public static function ajouter()
    {
        return function()
        {
            
        };
    }
}