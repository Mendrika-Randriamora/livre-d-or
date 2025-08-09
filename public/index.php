<?php

use App\Controller\AuthController;
use App\Controller\MessageController;
use App\Controller\PublicController;
use App\Controller\UserController;
use Core\Auth;
use Core\Route;

require_once  __DIR__ . "/../vendor/autoload.php";
// ##################################################
// ##################################################
// ##################################################


/**
 * La route pour hhttp://localhost:8000/
 */
Route::get('/', PublicController::index());


/**
 * Les Routes pour l'authentification
 */
Route::get('/register', AuthController::registerForm());
Route::post('/register', AuthController::register());

Route::get('/login', AuthController::loginForm());
Route::post('/login', AuthController::login());

Route::get('/message', MessageController::index());

Route::get('/message/new', MessageController::ajouter());

Route::post('/message/new', MessageController::stocker());

Route::post("/message/delete", MessageController::supprimer());

Route::get('/setting', UserController::profile());
Route::post('/setting', UserController::update());
