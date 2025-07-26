<?php

namespace App\Controller;

use App\Tables\Message;
use Core\Route;

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
            require_once "./views/ajoutForm.php";
            require_once "./elements/layout.php"; 
        };
    }

    public static function stocker()
    {
        return function() 
        {
            if (Route::is_csrf_valid()) 
            {
                Message::add([$_POST["name"], date("d-m-Y"), $_POST["content"]]); 
                header("Location: /");          
            } else
            {
                die("Désolé");
            }
        };
    }
}