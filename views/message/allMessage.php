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
        </div>
    </div>

    <?php

    use Core\Route;

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