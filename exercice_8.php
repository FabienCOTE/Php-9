<?php
$date = date('d-m-Y');
$dateDays = date('d-m-Y', strtotime('-22 days'));
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <title>Exercice 8</title>
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>
        <div>
            <h1>Exercice 8</h1>
            <p>Afficher la date du jour - 22 jours</p>
        </div>
        <div>
            <p>Date du jours : <?= $date; ?></p>
            <p>- 22 jours : <?= $dateDays; ?></p>
        </div>
    </body>
</html>