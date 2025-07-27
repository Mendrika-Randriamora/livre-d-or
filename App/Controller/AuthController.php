<?php

namespace App\Controller;

use App\Tables\User;
use Core\Auth;
use Core\Route;

class AuthController
{
    public static function registerForm()
    {
        return function() 
        {
            require_once "./views/auth/register.php";
            require_once "./elements/layout.php";
        };
    }

    public static function register()
    {
        return function()
        {
            if (Route::is_csrf_valid() && Auth::password_confirmed()) 
            {
                extract($_POST);

                if ($name && $email && $password) 
                {
                    session_start();
                    User::add([$name, $email, password_hash($password, PASSWORD_DEFAULT), "user"]);
                    $_SESSION["user_name"] = $name;
                    $_SESSION["role"] = "user"; 
                    header('Location: /message');
                    exit();
                } 
                header('Location: /register');
            } else 
            {
                header('Location: /register');
            }
        };
    }

    public static function loginForm()
    {
        return function()
        {
            require_once "./views/auth/login.php";
            require_once "./elements/layout.php";
        };
    } 

    public static function login()
    {
        return function()
        {
            if (Route::is_csrf_valid() && Auth::login()) 
            {
                header('Location: /message');
                exit();
            } else
            {
                header('Location: /login');
            }
        };
    }
}