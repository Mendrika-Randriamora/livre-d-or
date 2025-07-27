<?php ob_start() ?>
<style> 
    body {
        background: gray;
    }
</style>
<di class="fs-1 title text-center">
    Bienvenu dans Livre d'or,
    <br>
    où tout le monde à ses mots à dire
</di>

<?php $content = ob_get_clean() ?>