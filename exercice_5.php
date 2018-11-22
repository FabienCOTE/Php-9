<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <title>Exercice 5</title>
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>
        <div>
            <h1>Exercice 5</h1>
            <p>Afficher le nombre de jour qui sépare la date du jour avec le 16 mai 2016.</p>
        </div>
        <div>
            <?php
            $dateBefore = strtotime('2016-05-16');
            $difference = ceil((time() - $dateBefore) / 86400);
            echo $difference;
            ?>
        </div>
    </body>
</html>