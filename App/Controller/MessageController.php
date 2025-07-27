<?php

namespace App\Controller;

use App\Tables\Message;
use Core\Auth;
use Core\Route;

require_once "./vendor/autoload.php";

class MessageController
{
    public static function index() : \Closure
    { 
        return function()
        {
            // Pour dire que ceci est réserver au utilisateur connécté
            Auth::auth();

            $messages = Message::all();
            require_once "./views/message/allMessage.php";
            require_once "./elements/layout.php"; 
        };
    }

    public static function ajouter()
    {
        return function()
        {
            Auth::auth();
            
            require_once "./views/message/ajoutForm.php";
            require_once "./elements/layout.php"; 
        };
    }

    public static function stocker()
    {
        return function() 
        {
            Auth::auth();
            
            if (Route::is_csrf_valid()) 
            { 
                Message::add([$_POST["name"], date("d-m-Y"), $_POST["content"]]); 
                header("Location: /message");          
            } else
            {
                die("Désolé");
            }
        };
    }
}