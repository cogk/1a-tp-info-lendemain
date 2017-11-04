<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body>
    <?php
        require("../fonction-lendemain.php");
    ?>

    <?php
        $jour = isset($_GET["jour"]) ? intval($_GET["jour"]) : 1;
        $mois = isset($_GET["mois"]) ? intval($_GET["mois"]) : 1;
        $année = isset($_GET["année"]) ? intval($_GET["année"]) : 2017;
    ?>
    <form>
        <input name="jour" value="<?php echo $jour; ?>" type="number" min="1" max="31" />
        <input name="mois" value="<?php echo $mois; ?>" type="number" min="1" max="12" />
        <input name="année" value="<?php echo $année; ?>" type="number" />
        <input type="submit" value="Lendemain !">
    </form>
    <br/>
    <output>
        <?php
            $lendemainJMA = lendemain($jour, $mois, $année);

            if ($lendemainJMA == "invalide") {
                echo "<strong>La date entrée n'est pas valide</strong>";
            }
            else {
                echo join("/", $lendemainJMA);
            }
        ?>
    </output>
</body>
</html>
