<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <title>Exercice 1</title>
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>
        <div>
            <h1>Exercice 1</h1>
            <p>Afficher la date courante en respectant la forme jj/mm/aaaa (ex : 16/05/2016)</p>
        </div>
        <div>
            <p><?= date('d/m/Y'); ?></p>
        </div>
    </body>
</html>