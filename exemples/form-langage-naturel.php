<!doctype html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

    <style>
    input[name="date"], output {
        display: block;
        box-sizing: border-box;
        width: 100%;
        border: none;
        color: white;
        background-color: #58d;
        box-shadow: 0 2px 4px rgba(0,0,0, 0.2);
        border-radius: 2px;
        padding: 8px;
        font-size: 24px;
        font-family: "Lato", sans-serif;
    }
    input[name="date"] {
        border: none;
        color: white;
        background-color: #58d;
    }
    output {
        border: 1px solid #903;
        color: white;
        background-color: #d58;
        margin-top: 16px;
    }
    </style>
</head>
<body>
    <?php
    require("../lendemain.php");

    function mois_3_chars($str) {
        $accents = array('é' => 'e', 'è' => 'e', 'ê' => 'e', 'à' => 'a', 'û' => 'u');
        return substr(strtr(strtolower($str), $accents), 0, 3);
    }

    $nomDesMois = explode(" ", "janvier février mars avril mai juin juillet août septembre octobre novembre décembre");
    $nomDesMois3C = array_map(mois_3_chars, $nomDesMois);

    function get_num_mois($nomDuMois) {
        global $nomDesMois3C;
        return array_search($nomDuMois, $nomDesMois3C) + 1;
    }
    function get_nom_mois($mois) {
        global $nomDesMois;
        return $nomDesMois[$mois - 1];
    }

    function lendemain_str($dateString) {
        $elementsDeDate = explode(" ", $dateString);

        // On récupère le numéro du jour.
        $jour = intval( $elementsDeDate[0] );

        /* On récupère le nom du mois (string)
         * en minuscule
         * et en supprimant les accents.
         * Exemple : "Décembre" -> "dec"
         */
        $nomDuMois = mois_3_chars($elementsDeDate[1]);
        $mois = get_num_mois($nomDuMois);

        $année = intval( $elementsDeDate[2] );

        $lendemainAMJ = lendemain($jour, $mois, $année);
        $d_jour = intval($lendemainAMJ[0]);
        $d_mois = intval($lendemainAMJ[1]);
        $d_année = intval($lendemainAMJ[2]);

        afficherDate($d_jour, $d_mois, $d_année);
    }
    function afficherDate($jour, $mois, $année) {
        echo $jour, " ", get_nom_mois($mois), " ", $année;
    }
    ?>



    <? $date = isset($_GET["date"]) ? strip_tags($_GET["date"]) : "19 avril 1999"; ?>
    <form>
        <input name="date" value="<? echo $date; ?>" type="text" />
    </form>
    <output>
        <? lendemain_str($date) ?>
    </output>
</body>
</html>
