<?php
setlocale(LC_TIME, 'fr_FR.utf8','fra');
$date = date('l d F Y');
$dateFr = strftime('%A %d %B %Y');
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <title>Exercice 3</title>
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>
        <div>
            <h1>Exercice 3</h1>
            <p>Afficher la date courante avec le jour de la semaine et le mois en toutes lettres (ex : mardi 2 août 2016)</p>
            <p>Bonus : Le faire en français.</p>
        </div>
        <div>
            <p><?= $date; ?></p>
            <p>Bonus : <?= $dateFr; ?></p>
        </div>
    </body>
</html>