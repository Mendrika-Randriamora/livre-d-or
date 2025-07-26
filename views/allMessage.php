
<?php
ob_start();
?>
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <div class="fs-1">Liste des messages</div>
        <a href="/new">
            <button type="button" class="btn btn-primary">Nouvelle message</button>
        </a>
    </div>

    <?php

    foreach($messages as $message): ?>
        <article class="card mt-4 p-2">

        <div class="car-title d-flex justify-content-between">
            <h3><?= htmlspecialchars($message["name"])?></h3>
            <em>   énvoyé le <?= htmlspecialchars($message["date"])?></em>
        </div>

        <div class="card-body">
            <?= htmlspecialchars($message["message"])?>
        </div>

        </article>
    <?php endforeach; ?>

</div>

<?php $content = ob_get_clean(); ?>