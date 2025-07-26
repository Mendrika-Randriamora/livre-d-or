<?php

use App\Controller\MessageController;
use Core\Route;

require_once  __DIR__ . "/vendor/autoload.php";
// ##################################################
// ##################################################
// ##################################################


/**
 * La route pour hhttp://localhost:8000/
 */
Route::get('/message', MessageController::index());

Route::get('/message/new', MessageController::ajouter());

Route::post('/message/new', MessageController::stocker());

