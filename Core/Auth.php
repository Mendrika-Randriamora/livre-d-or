<?php

namespace Core;

use App\Tables\User;

class Auth
{
    public static function login(): null|array
    {
        session_start();
        if ($_SESSION["user_name"] ?? false) {
            $user = User::where("name", $_SESSION["user_name"]);
            if (!$user) {
                return null;
            }
        } else {
            $user = User::where("email", $_POST["email"] ?? null);
            if (!$user) {
                return null;
            }
            $_SESSION["user_name"] = $user["name"];
            $_SESSION["role"] = $user["role"];

            if (!isset($_POST["password"]) || !password_verify($_POST["password"], $user["password"])) {
                return null;
            }
        }

        return is_array($user) ? $user : null;
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
