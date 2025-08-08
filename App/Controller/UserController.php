<?php

namespace App\Controller;

use Core\Auth;
use Core\View;
use App\Tables\User;
use Core\Route;

class UserController
{
    public static function profile()
    {
        return function () {
            /* 
            session_start();
            $_SESSION['error'] = $_SESSION['error'] ?? ""; // Initialize error session variable if not set
            var_dump($_SESSION);
            echo "User login status: " . "<br>";
            var_dump(Auth::login()); 
        */

            $user = Auth::login();

            View::render("user/profile", [
                'user' => $user,
            ]);
        };
    }

    public static function update()
    {

        return function () {
            /* 
                var_dump(Auth::login());
                echo "Received POST data: <br>";
                var_dump($_POST);
                exit();
            */
            if (!Route::is_csrf_valid()) return header('Location: /setting');
            extract($_POST);
            session_start();

            $user = Auth::login();

            if ($password !==  $password_confirmation) {
                $_SESSION['error'] = "Passwords do not match.";
                header('Location: /setting');
                exit();
            }

            if ($password) {
                User::update($user["id"], [
                    'name' => $name,
                    'email' => $email,
                    'password' => password_hash($password, PASSWORD_DEFAULT),
                ]);
            } else {
                User::update($user["id"], [
                    'name' => $name,
                    'email' => $email,
                ]);
            }

            // Recharger l'utilisateur à jour et mettre à jour la session
            $updatedUser = User::find($user["id"]);
            $_SESSION["user_name"] = $updatedUser["name"];
            $_SESSION["role"] = $updatedUser["role"];

            header('Location: /setting');
            exit();
        };
    }
}
