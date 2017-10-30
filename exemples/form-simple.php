<!doctype html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body>
    <?php require("../lendemain.php"); ?>

    <?
        $jour = isset($_GET["jour"]) ? intval($_GET["jour"]) : 1;
        $mois = isset($_GET["mois"]) ? intval($_GET["mois"]) : 1;
        $année = isset($_GET["année"]) ? intval($_GET["année"]) : 2017;
    ?>
    <form>
        <input name="jour" value="<? echo $jour; ?>" type="number" min="1" max="31" />
        <input name="mois" value="<? echo $mois; ?>" type="number" min="1" max="12" />
        <input name="année" value="<? echo $année; ?>" type="number" />
        <input type="submit" value="Lendemain !">
    </form>
    <br/>
    <output>
        Date du lendemain : <? echo join("/", lendemain($jour, $mois, $année)); ?>
    </output>
</body>
</html>
