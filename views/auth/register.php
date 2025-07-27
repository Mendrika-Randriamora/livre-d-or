<?php

use Core\Route;

ob_start() ?>
<div>
    <h3 class="container text-center">
        Page d'inscription
    </h3>
    <form style="max-width: 400px;" action="/register" class="d-flex flex-column" method="post">
        <?php Route::set_csrf() ?>
        <div class="row form-group gap-2">
            <label for="name">Votre nom : </label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>    
        <div class="row form-group gap-2">
            <label for="email">Votre email : </label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>   
        <div class="row form-group gap-2">
            <label for="password">Votre mot de passe : </label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>   
        <div class="row form-group gap-2">
            <label for="password_confirmation">Confirmer votre mot de passe : </label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
        </div>
        <div class="row mt-3 gap-2">
            <button type="submit" class="btn btn-primary">S'inscrir</button>
        </div>  
    </form>
</div>
<?php $content = ob_get_clean() ?>