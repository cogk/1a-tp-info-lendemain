<?php
    include("../fonction-lendemain.php");

    function test($j, $m, $a) {
        $l = lendemain($j, $m, $a);
        echo "$j/$m/$a -> " . ($l == "invalide" ? "INVALIDE !" : join("/", $l)) . "<br/>";
    }


    test(31, 1, 2017);
    test(28, 2, 2019);
    test(28, 2, 2020);
    test(30, 4, 2017);
    test(30, 5, 2017);
    test(31, 12, 2017);
    test(30, 8, 2017);
    test(30, 9, 2017);


    // Tests fournis dans le sujet
    echo "<hr />";
    test(11, 12, 1998); // -> 12, 12, 1998
    test(31, 12, 1998); // -> 1, 1, 1999
    test(28, 2, 2016);    // -> 29, 2, 2016
    test(28, 2, 2015);    // -> 1, 3, 2015


    /*
    echo "<hr />";
    for ($a = 2016; $a <= 2017; $a++) {
        echo "<h2>Année $a</h2>";
        for ($m = 1; $m <= 12; $m++) {
            echo "<h3>Mois $m</h3>";
            for ($j = 1; $j <= 31; $j++) {
                test($j, $m, $a);
            }
        }
    }
    */

    echo "Fin.";
?>
