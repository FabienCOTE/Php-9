<?php
//Date française
setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
$selectedMonth = '';
$selectedYear = '';
$count = 0; 
//Année
$yearMin = 1970;
$yearMax = 2028;
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
if (isset($_POST['month']) && isset($_POST['year'])) {
    $selectedMonth = $_POST['month'];
    $selectedYear = $_POST['year'];
    $nbDaysMonth = cal_days_in_month(CAL_GREGORIAN, $selectedMonth, $selectedYear);//Nombre de jour dans le mois
    $firstDay = ucfirst(strftime('%A', mktime(0, 0, 0, $selectedMonth, 1, $selectedYear)));//Premier jour du mois avec la première lettre en majuscule
    //Function qui permet de mettre la couleur blanc en background, de vérifier le premier jour du mois et activer les jours de la premiere ligne
    function dateCalendar($day, $class) {
        global $firstDay;
        global $count;
        $noCount = '';
        if ($firstDay == $day) {
            if ($class == 'ok') {
                return 'bg-light';
            } else {
                $noCount = 'ok';
                return $count = 1;
            }
        }
        if ($count != 0 && $noCount != 'ok') {
            if ($class == 'ok') {
                return 'bg-light';
            } else {
                return $count += 1;
            }
        }
    }
    //Function qui rajoute dans la deuxième ligne du calendrier le nombre de jours restant dans le mois
    function limitDay($class) {
        global $count;
        global $nbDaysMonth;
        if (isset($count)) {
            if ($count < $nbDaysMonth) {
                if ($class == 'ok') {
                    return 'bg-light';
                } else {
                    return $count += 1;
                }
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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>
        <div>
            <h1>Calendrier</h1>
            <form class="form-inline" method="post" action="">
                <label class="my-1 mr-2" for="month">Mois</label>
                <select class="custom-select my-1 mr-sm-2" id="month" name="month" required>
                    <option <?= empty($selectedMonth) ? 'selected' : ''; ?> disabled>Choisissez votre mois</option>
                    <?php foreach ($monthArray as $monthNb => $month) { ?>
                        <option value="<?= $monthNb; ?>" <?= $monthNb == $selectedMonth ? 'selected' : ''; ?>><?= $month; ?></option>
                    <?php } ?>
                </select>
                <label class="my-1 mr-2" for="year">Année</label>
                <select class="custom-select my-1 mr-sm-2" id="year" name="year" required>
                    <option <?= empty($selectedYear) ? 'selected' : ''; ?> disabled>Choisissez votre année</option>
                    <?php for ($yearMin; $yearMin <= $yearMax; $yearMin++) { ?>
                        <option value="<?= $yearMin; ?>" <?= $yearMin == $selectedYear ? 'selected' : ''; ?>><?= $yearMin; ?></option>
                    <?php } ?>
                </select>
                <button type="submit" class="btn btn-primary my-1">Envoyer</button>
            </form>
        </div>
        <?php if (isset($_POST['month']) && isset($_POST['year'])) { ?>
        <div>
            <h1><?= $monthArray[$selectedMonth]; ?> - <?= $selectedYear; ?></h1>
            <p>Il y a <?= $nbDaysMonth; ?> jours dans ce mois</p>
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
                    <tr>
                    <?php foreach ($dayArray as $day) { ?>
                        <td class="<?= dateCalendar($day, 'ok'); ?>"><?= dateCalendar($day, ''); ?></td>
                    <?php } ?>
                    </tr>
                <?php for ($count; $count < $nbDaysMonth; $count) { ?>
                    <tr>
                    <?php for ($td = 0; $td < 7; $td++) { ?>
                        <td class="<?= limitDay('ok'); ?>"><?= limitDay(''); ?></td>
                    <?php } ?>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <?php } else { ?>
        <p>Selectionnez une date et une année pour voir le calendrier</p>
        <?php } ?>
    </body>
</html>