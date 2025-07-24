<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <title><?= $title ?? "Livre d'or" ?></title>
</head>
<body>
    
    <div class="container">
        <?= $page_content ?? "" ?>
    </div>

</body>
</html>