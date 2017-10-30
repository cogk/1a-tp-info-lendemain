<?php
function lendemain($jour, $mois, $année) {
    // Un mois est long quand il dure 31 jours.
    $moisLong = $mois == 1   // Janvier
             || $mois == 3   // Mars
             || $mois == 5   // Mai
             || $mois == 7   // Juillet
             || $mois == 8   // Août
             || $mois == 10  // Octobre
             || $mois == 12; // Décembre

    // Une année est bissextile quand son millésime est divisible par 4.
    $bissextile = $année % 4 == 0;


    $finDuMois = $jour == 31 // La fin du mois est le 31è jour
              || $jour == 30 && !$moisLong // Ou le 30è d'un mois qui n'est pas long
              || $mois == 2 && ($jour == 29 || $bissextile && $jour == 28); // Ou le 29è de février, ou le 28è de février quand l'année est bissextile

    if ($finDuMois) {
        $jour = 1;
        $mois += 1;
    }
    else {
        $jour += 1;
    }

    if ($mois > 12) {
        $mois = 1;
        $année += 1;
    }

    return [$jour, $mois, $année];
}
?>
