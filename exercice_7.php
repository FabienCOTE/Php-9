<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
            <p>Date du jours : <?= date('d-m-Y'); ?><br /> + 20 jours : <?= date('d-m-Y', strtotime(date('d-m-Y') . '+20 days')); ?></p>
        </div>
    </body>
</html>