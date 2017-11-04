<?php
// Corentin Forler

// Ce fichier ne contient que la fonction `lendemain`.
// Un exemple très simple d'utilisation se trouve dans le fichier `formulaire.php`
// Des exemples plus avancés sont disponibles dans le dossier `exemples`.

define(DATE_INVALIDE, "invalide");

// Retourne un triplet (tableau de 3 valeurs), ou la chaîne "invalide"
function lendemain($jour, $mois, $année) {
    // https://fr.wikipedia.org/wiki/Ann%C3%A9e_bissextile
    $bissextile = (($année % 4 == 0) and ($année % 100 != 0)) or ($année % 400 == 0);

    if ($mois == 1 or $mois == 3 or $mois == 5 or $mois == 7 or $mois == 8 or $mois == 10 or $mois == 12) {
        $n_jours = 31;
    }
    elseif ($mois == 4 or $mois == 6 or $mois == 9 or $mois == 11) {
        $n_jours = 30;
    }
    elseif ($mois == 2) {
        if ($bissextile) {
            $n_jours = 29;
        }
        else {
            $n_jours = 28;
        }
    }


    // (a) Date valide ?
    if ($mois > 12 or $mois < 1) {
        return DATE_INVALIDE;
    }
    if ($jour > 31 or $jour < 1) {
        return DATE_INVALIDE;
    }
    if ($jour > $n_jours) {
        return DATE_INVALIDE;
    }

    // (b) Calcul du lendemain
    if ($jour == $n_jours) {
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