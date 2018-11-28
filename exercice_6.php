<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <title>Exercice 6</title>
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>
        <div>
            <h1>Exercice 6</h1>
            <p>Afficher le nombre de jour dans le mois de février de l'année 2016.</p>
        </div>
        <div>
            <p><?= cal_days_in_month(CAL_GREGORIAN, 2, 2016); ?> jours</p>
        </div>
    </body>
</html>