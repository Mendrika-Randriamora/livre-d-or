<?php

use App\Controller\PublicController;
use Core\Route;

require_once  __DIR__ . "/vendor/autoload.php";
// ##################################################
// ##################################################
// ##################################################


/**
 * La route pour hhttp://localhost:8000/
 */
Route::get('/', PublicController::index());

Route::get('/new', PublicController::ajouter());

Route::post('/new', PublicController::stocker());

