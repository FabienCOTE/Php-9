<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <title>Exercice 4</title>
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>
        <div>
            <h1>Exercice 4</h1>
            <p>Afficher le timestamp du jour.<br />Afficher le timestamp du mardi 2 août 2016 à 15h00.</p>
        </div>
        <div>
            <p><?= time(); ?></p>
            <p><?= mktime(15, 0, 0, 8, 2, 2016); ?></p>
        </div>
    </body>
</html>