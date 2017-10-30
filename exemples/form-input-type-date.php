<!doctype html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <style>
    input[name="date"], output {
        box-sizing: border-box;
        width: 100%;
        margin: 8px 0;
        border: none;
        color: white;
        background-color: #58d;
        box-shadow: 0 2px 4px rgba(0,0,0, 0.2);
        border-radius: 2px;
        padding: 8px;
        font-size: 24px;
        font-family: monospace;
    }
    input[name="date"] {
        border: 1px solid #35a;
        color: white;
        background-color: #58d;
    }
    output {
        display: block;
        border: 1px solid #903;
        color: white;
        background-color: #d58;
        margin-top: 16px;
    }
    </style>
</head>
<body>
    <?php require("../lendemain.php"); ?>


    <? $date = (isset($_GET["date"]) && !empty($_GET["date"])) ? strip_tags($_GET["date"]) : "1999-04-19"; ?>
    <form>
        <input name="date" value="<? echo $date; ?>" type="date" />
        <input type="submit" value="Lendemain !">
    </form>

    <output>
        <?
            $aaaammjj = explode("-", $date);
            $jour = $aaaammjj[2];
            $mois = $aaaammjj[1];
            $année = $aaaammjj[0];
            echo join("/", lendemain($jour, $mois, $année));
        ?>
    </output>
</body>
</html>
