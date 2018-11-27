<?php
$monthSelected = 1;
$yearSelected = 1970;
$activeCalendar = '';
$count = 0;
//Date française
setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
//Année
$yearMin = 1970;
$yearMax = 2050;
//Mois
$monthArray = [
    1 => 'Janvier',
    2 => 'Février',
    3 => 'Mars',
    4 => 'Avril',
    5 => 'Mai',
    6 => 'Juin',
    7 => 'Juillet',
    8 => 'Août',
    9 => 'Septembre',
    10 => 'Octobre',
    11 => 'Novembre',
    12 => 'Décembre'
];
//Jours
$dayArray = [
    'Lundi',
    'Mardi',
    'Mercredi',
    'Jeudi',
    'Vendredi',
    'Samedi',
    'Dimanche'
];
//On vérifie que les variables mois et année existent
if(isset($_POST['month']) && isset($_POST['year'])) {
    $monthSelected = $_POST['month'];
    $yearSelected = $_POST['year'];
    $nbDaysMonth = cal_days_in_month(CAL_GREGORIAN, $monthSelected, $yearSelected);//Nombre de jour dans le mois
    $firstDay = ucfirst(strftime('%A', mktime(0, 0, 0, $monthSelected, 1, $yearSelected)));//Premier jour du mois avec la première lettre en majuscule
    //Function qui permet de mettre la couleur blanc en background et de vérifier le premier jour du mois et activer les jours de la premier ligne
    function dateCalendar($day, $class) {
        global $firstDay;
        global $activeCalendar;
        global $count;
        $dateStart = 1;
        if ($firstDay == $day && $activeCalendar != 'ok') {
            $activeCalendar = 'ok';
        }
        if ($firstDay == $day && $activeCalendar == 'ok') {
            if ($class == 'ok') {
                return 'bg-light';
            } else {
                return $dateStart;
            }
        }
        if ($firstDay != $day && $activeCalendar == 'ok') {
            if ($class == 'ok') {
                return 'bg-light';
            } else {
                $count++;
                return 1 + $count;
            }
        }
    }
    //Function qui rajoute dans la deuxième ligne du calendrier le nombre de jours restant dans le mois
    function stopFor($class) {
        global $days;
        global $nbDaysMonth;
        if ($days < $nbDaysMonth) {
            if ($class == 'ok') {
                return 'bg-light';
            } else {
                return $days += 1;
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>TP</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>
        <div>
            <form method="post" action="" enctype="multipart/form-data">
                <p>
                    <label for="month">Mois</label>
                    <select name="month" id="month" required>
                        <?php foreach ($monthArray as $monthNb => $month) { ?>
                            <option value="<?= $monthNb; ?>" <?= $monthNb==$monthSelected ? 'selected' : ''; ?>><?= $month; ?></option>
                        <?php } ?>
                    </select>
                    <label for="year">Année</label>
                    <select name="year" id="year" required>
                        <?php for($yearMin; $yearMin <= $yearMax; $yearMin++) { ?>
                            <option value="<?= $yearMin; ?>" <?= $yearMin==$yearSelected ? 'selected' : ''; ?>><?= $yearMin; ?></option>
                        <?php } ?>
                    </select>
                    <input type="submit" value="Envoyer" />
                </p>
            </form>
        </div>
        <div>
            <?php
            if (isset($_POST['month']) && isset($_POST['year'])) {
            ?>
            <h1><?= $monthArray[$monthSelected]; ?> - <?= $yearSelected; ?></h1>
            <p>Il y a <?= $nbDaysMonth; ?> jours dans ce mois</p>
            <?php
            }
            ?>
        </div>
        <div>
            <table class="table table-bordered table-responsive-lg text-center">
                <thead class="thead-dark">
                    <tr>
                        <?php foreach($dayArray as $day) { ?>
                        <th scope="col"><?= $day; ?></th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody class="bg-secondary">
                    <?php
                    if(isset($_POST['month']) && isset($_POST['year'])) {
                    ?> 
                    <tr>
                        <?php foreach ($dayArray as $day) { ?>
                        <td class="<?= dateCalendar($day, 'ok'); ?>"><?= dateCalendar($day, ''); ?></td>
                        <?php } ?>
                    </tr>
                        <?php for ($days = $count+1; $days < $nbDaysMonth; $days) { ?>
                    <tr>
                        <?php for ($i = 0; $i < 7; $i++) { ?>
                        <td class="<?= stopFor('ok'); ?>"><?= stopFor(''); ?></td>
                        <?php } ?>
                    </tr>
                        <?php } ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </body>
</html>