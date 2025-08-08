<?php

namespace App\Controller;

use App\Tables\Message;
use Core\Auth;
use Core\Route;
use Core\View;

require_once "./../vendor/autoload.php";

class MessageController
{
    public static function index(): \Closure
    {
        return function () {
            // Pour dire que ceci est réserver au utilisateur connécté
            Auth::auth();

            View::render('message/allMessage', [
                "messages" => Message::all()
            ]);
        };
    }

    public static function ajouter()
    {
        return function () {
            Auth::auth();

            $user = Auth::login();

            View::render("message/ajoutForm", [
                'user' => $user,
            ]);
        };
    }

    public static function stocker()
    {
        return function () {
            Auth::auth();

            if (Route::is_csrf_valid()) {
                Message::add([$_POST["name"], date("d-m-Y"), $_POST["content"]]);
                header("Location: /message");
            } else {
                die("Désolé");
            }
        };
    }
}
