<?php

use Core\Route; ?>
<div>
    <h3 class="container text-center">
        Page de connexion
    </h3>
    <form action="/login" method="post">
        <?php Route::set_csrf() ?>
        <div class="row form-group gap-2">
            <label for="email">Votre email : </label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="row form-group gap-2">
            <label for="password">Votre mot de passe : </label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="row mt-3 gap-2">
            <button type="submit" class="btn btn-primary">Se connecter</button>
        </div>
    </form>
</div>