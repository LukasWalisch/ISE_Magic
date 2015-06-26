<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="SS14 IS Engineering (PR), Universitaet Wien">
    <meta name="author" content="Team 13">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="main.css" rel="stylesheet">

    <title>Kartensuche</title>
</head>
<body>

    <?php include_once "header.php"; ?>

    <div class="container field">
        <h2 class="item-title">Gefundene Karten</h2>
        <?php

        $checkType = $_POST["checkType"];
        $nameString = $_POST["nameString"];
        $checkColor = $_POST["checkColor"]; //Array

        include "PHP_Functions/searchCard.php"; //Returns cardFoundQuery.
        if(! $cardFoundQuery )
        {
            ?>
            <div class="alert alert-info" role="alert">
                Keine Karten gefunden.
            </div>
            <?php
            die("Keine Ergebnisse");
        }
        while ($zeile = mysqli_fetch_array($cardFoundQuery, MYSQL_ASSOC))
        {
            $flag = true;
            foreach($checkColor as $checkedColor)
            {
                if ($zeile[$checkedColor] > 0)
                {
                    $flag = false;
                    break;
                }
            }
            if (!(empty($checkColor)))
            {
                if ($flag) continue;
            }
            if (!(empty($checkType)) && !(in_array($zeile["cardtype"], $checkType))) continue;
            if ($nameString == "" || strpos($zeile["name"],$nameString) !== false)
            {
                $typeString = "";
                if ($zeile["legendary"] == 0)
                {
                    $typeString .= "Legendary";
                }
                if ($zeile["cardtype"] == "Spell") $typeString .= $zeile["Spelltype"];
                else $typeString .= $zeile["cardtype"];
                ?>

                <div class="row">
                    <div class="col-xs-3">
                        <img src="bilder/rueckseite.jpeg" width="160" height="auto" align="right">
                    </div>
                    <div class="col-xs-8">
                        <ul class="list-group">
                            <li class="list-group-item"><h4><?php echo $zeile["name"] ?></h4></li>
                            <li class="list-group-item">
                                <?php echo $typeString ?>
                                    Rarität: <?php echo $zeile["rarity"] ?><br/>
                                    Edition: <?php echo $zeile["edition"] ?><br/>
                                    Manakosten:
                                            <?php
                                            if ($zeile["red"] > 0) echo $zeile["red"] . "Rot  ";
                                            if ($zeile["blue"] > 0) echo $zeile["blue"] . "Blau  ";
                                            if ($zeile["black"] > 0) echo $zeile["black"] . "Schwarz  ";
                                            if ($zeile["green"] > 0) echo $zeile["green"] . "Grün  ";
                                            if ($zeile["white"] > 0) echo $zeile["white"] . "Weiß  ";
                                            if ($zeile["colorless"] > 0) echo $zeile["colorless"] . "Colorless  ";
                                            ?>
                                            </br>
                                            Fähigkeiten:
                                                        <?php
                                                        $sqlAbility = "SELECT * FROM Ability WHERE cardname =" . $zeile["name"];
                                                        $sqlAbilityResult = mysqli_query($sqlConnection, $sqlAbility);
                                                        while ($row = mysql_fetch_array($sqlAbilityResult, MYSQL_ASSOC))
                                                        {
                                                            echo $row["description"];
                                                        }
                                                        if ($zeile["Cardtype"] == "Creature")
                                                        {
                                                        ?>
                                                            Statische Effekte: <?php echo $zeile["staticeffects"] ?>
                                                            Stärke: <?php echo $zeile["attack"] ?><br/>
                                                            Widerstandskraft: <?php echo $zeile["defense"] ?><br/>
                                                        <?php
                                                        }elseif ($zeile["cardtype"] == "Planeswalker") echo "Planeswalker Leben" . $zeile["life"] . "<br/>";
                                                        ?>
                                <form action="editDeck.php" method="post">
                                <div class="dropdown ">
                                    <select class="btn btn-default btn-lg dropdown-toggle">
                                    <?php
                                        include "PHP_Functions/searchDeck.php";
                                        while ($rowDeck = mysql_fetch_array($deckFoundQuery, MYSQL_ASSOC)) {
                                            echo "<option>".$rowDeck['deckname']."</option>";
                                        }
                                    ?>
                                    </select>
                                </div>
                                <input class="btn btn-success" type="submit" value="Zu einem Deck hinzufügen">

                                </form>
                            </li>

                        </ul>

                    </div>
                    <div class="col-xs-1"></div>

                </div>


        <?php
            }
        }

        ?>

    </div>



    <?php include_once "footer.php"; ?>
    <!-- Bootstrap core JavaScript && jquery -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

</body>
</html>
