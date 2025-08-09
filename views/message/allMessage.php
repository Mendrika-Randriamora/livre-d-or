<?php

use Core\Route;
?>
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <div class="fs-1">Liste des messages</div>

        <div class="align-items-center">
            <a href="/message/new">
                <button type="button" class="btn btn-primary">Nouvelle message</button>
            </a>
            <a class="btn btn-lg" href="/setting">
                <img style="width: 20px;" src="/../img/gear.svg" alt="setting">
            </a>
            <form style="display: inline-block;" action="/logout" method="post">
                <?php Route::set_csrf() ?>
                <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
                        <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                    </svg>
                </button>
            </form>
        </div>
    </div>

    <?php

    foreach ($messages as $message): ?>
        <article class="card mt-4 p-2">

            <div class="car-title d-flex justify-content-between">
                <h3><?= htmlspecialchars($message["name"]) ?></h3>
                <em> énvoyé le <?= htmlspecialchars($message["created_at"]) ?></em>
            </div>

            <div class="card-body">
                <?= htmlspecialchars($message["message"]) ?>
            </div>

            <?php if ($message["name"] == $_SESSION["user_name"]) : ?>
                <div class="d-flex justify-content-end">
                    <form action="/message/delete/" method="post">
                        <?php Route::set_csrf() ?>
                        <input type="hidden" name="id" value="<?= $message['id'] ?>">
                        <input class="btn btn-sm btn-danger" type="submit" value="supprimer">
                    </form>
                </div>
            <?php endif ?>
        </article>
    <?php endforeach; ?>

</div>