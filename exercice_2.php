<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <title>Exercice 2</title>
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>
        <div>
            <h1>Exercice 2</h1>
            <p>Afficher la date courante en respectant la forme jj-mm-aa (ex : 16-05-16)</p>
        </div>
        <div>
            <p><?= date('d-m-y'); ?></p>
        </div>
    </body>
</html>