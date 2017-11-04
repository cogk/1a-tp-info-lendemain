<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body>
    <?php
        require("./fonction-lendemain.php");
    ?>

    <?php
        if (isset($_GET["date"]) && !empty($_GET["date"])) {
            $date = strip_tags($_GET["date"]);
        }
        else {
            $date = "1999-04-19";
        }
    ?>

    <form action="" method="GET">
        <input name="date" value="<?php echo $date; ?>" type="date" />
        <input type="submit" value="Lendemain !">
    </form>

    <output>
        <?php
            $aaaammjj = explode("-", $date);
            $jour = $aaaammjj[2];
            $mois = $aaaammjj[1];
            $année = $aaaammjj[0];

            $lendemain = lendemain($jour, $mois, $année);
            if ($lendemain == "invalide") {
                echo "<strong>La date n'est pas valide</strong>";
            }
            else {
                echo join("/", $lendemain);
            }
        ?>
    </output>
</body>
</html>
