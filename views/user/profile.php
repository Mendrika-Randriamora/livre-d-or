<?php
session_start();

use Core\Route; ?>
<div>
    <?php if (isset($_SESSION['error']) && $_SESSION['error'] !== ""): ?>
        <div class="alert alert-danger" role="alert">
            <?= $_SESSION['error'] ?>
        </div>
    <?php endif; ?>

    <h3 class="container text-center">
        Votre profil
    </h3>
    <form style="max-width: 400px;" action="" class="d-flex flex-column" method="post">
        <?php Route::set_csrf() ?>
        <div class="row form-group gap-2">
            <label for="name">Votre nom : </label>
            <input type="text" name="name" id="name" class="form-control" value="<?= $user['name'] ?? ''; ?>" required>
        </div>
        <div class="row form-group gap-2">
            <label for="email">Votre email : </label>
            <input type="email" name="email" id="email" class="form-control" value="<?= $user['email'] ?? ''; ?>" required>
        </div>
        <div class="row form-group gap-2">
            <label for="password">Votre mot de passe : </label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="row form-group gap-2">
            <label for="password_confirmation">Confirmer votre mot de passe : </label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
        </div>
        <div class="row mt-3 gap-2">
            <button type="submit" class="btn btn-primary">Modifier</button>
        </div>
    </form>
</div>