<?php

namespace Core;

use App\Tables\User;

class Auth
{
    public static function login(): bool
    {
        session_start();
        $user = User::where("email", $_POST["email"]);

        if (!$user) {
            return false;
        }

        if (!password_verify($_POST["password"], $user["password"])) {
            return false;
        }

        $_SESSION["user_name"] = $user["name"];
        $_SESSION["role"] = $user["role"];

        return true;
    }

    public static function logout()
    {
        session_start();
        session_unset();
        session_destroy();

        header('Location: /login');
    }

    public static function password_confirmed(): bool
    {
        if (!$_POST["password"] && $_POST["password_confirmation"]) {
            return false;
        }

        if ($_POST["password"] != $_POST["password_confirmation"]) {
            return false;
        }
        return true;
    }

    public static function auth()
    {
        session_start();
        if (!$_SESSION["user_name"]) {
            header('Location: /login');
        }
    }

    public static function guest() {}
}
