<?php
$date = date('d-m-Y');
$dateDays = date('d-m-Y', strtotime('20 days'));
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <title>Exercice 7</title>
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>
        <div>
            <h1>Exercice 7</h1>
            <p>Afficher la date du jour + 20 jours.</p>
        </div>
        <div>
            <p>Date du jours : <?= $date; ?></p>
            <p>+ 20 jours : <?= $dateDays; ?></p>
        </div>
    </body>
</html>