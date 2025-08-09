<?php

use Core\Route; ?>

<form class="form-group" action="" method="post">
    <?php
    Route::set_csrf();
    ?>
    <div class="row mb-3 gap-2">
        <label for="name">Votre nom : </label>
        <input
            type="text" name="name" id="name"
            class="form-control"
            placeholder="Jean Marie"
            value="<?= $user['name'] ?? ''; ?>"
            required
            disabled>

    </div>
    <div class="row mb-3 gap-2">
        <label for="content">Votre message : </label>
        <textarea name="content" id="content" class="form-control" required>
        </textarea>
    </div>

    <div class="d-flex justify-content-center">
        <button type="submit" class="w-75 btn btn-primary">Publier</button>
    </div>
</form>