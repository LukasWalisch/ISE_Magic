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
        include "PHP_Functions/mySqlConnect.php";
        $sqlAbilityQuery = "SELECT * FROM Ability";
        $sqlAbilityResult = mysqli_query($sqlConnection, $sqlAbilityQuery);
        $foundDecks = array();
        include "PHP_Functions/searchDeck.php";
        while ($rowDeck = mysqli_fetch_array($deckFoundQuery, MYSQL_ASSOC))
        {
            $foundDecks[] = $rowDeck["deckname"];
        }
        $checkType = $_POST["checkType"];
        $nameString = $_POST["nameString"];
        $checkColor = $_POST["checkColor"]; //Array

        include "PHP_Functions/searchCard.php"; //Returns cardFoundQuery.

        // ANZAHL DER TUPEL
        $numberOfRows = mysqli_num_rows($cardFoundQuery);
        echo $numberOfRows;


        if($numberOfRows == 0) {
            ?>

            <div class="alert alert-info text-center" role="alert">
                <strong>Keine Karten gefunden.</strong>
            </div>

            <?php
            include_once "footer.php";
            die();
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
                if ($zeile["legendary"] == "Ja")
                {
                    $typeString .= "Legendary ";
                }
                if ($zeile["cardtype"] == "Spell") $typeString .= $zeile["spelltype"];
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
                                <?php echo $typeString ?><br/>
                                    Rarität: <?php echo $zeile["rarity"] ?><br/>
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
                                            Fähigkeiten:<br/>
                                                        <?php
                                                        $dynCardName = $zeile["card_ID"];
                                                        include "PHP_Functions/mySqlConnect.php";
                                                        $sqlAbilityQuery = "SELECT * FROM Ability WHERE card_ID ='$dynCardName'";
                                                        $sqlAbilityResult = mysqli_query($sqlConnection, $sqlAbilityQuery);
                                                        $countAbility = 1;
                                                        foreach ($sqlAbilityResult as $SingleAbilityResult)
                                                        {

                                                            if ($SingleAbilityResult["card_ID"] == $dynCardName)
                                                            {
                                                                echo $countAbility . ". Fähigkeit: " . $SingleAbilityResult["description"];
                                                                echo "<br/>";
                                                                $countAbility += 1;
                                                        }
                                                        }
                                                        if ($zeile["cardtype"] == "Creature")
                                                        {
                                                        ?>
                                                            Statische Effekte: <?php echo $zeile["staticeffects"] ?><br/>
                                                            Stärke: <?php echo $zeile["attack"] ?><br/>
                                                            Widerstandskraft: <?php echo $zeile["defense"] ?><br/>
                                                        <?php
                                                        }elseif ($zeile["cardtype"] == "Planeswalker") echo "Planeswalker Leben" . $zeile["life"] . "<br/>";
                                                        ?>
                                <form action="navigation.php" method="post" class="form-with-buttons">
                                <div class="dropdown ">
                                    <select class="btn btn-default dropdown-toggle" name="selectedDeck">
                                    <?php
                                        foreach ($foundDecks as $foundSingleDeck)
                                        {
                                            echo "<option>" . $foundSingleDeck . "</option>";
                                        }
                                    ?>
                                    </select>
                                </div>
                                    <input type="hidden" value="<?php echo $zeile["card_ID"] ?>" name="cardID"/>
                                <input class="btn btn-success " name="deleteCardSubmit" type="submit" value="Zu einem Deck hinzufügen" style="margin-left: auto">

                                </form>
                                <form action="navigation.php" method="post" class="form-with-buttons">
                                    <input type="hidden" value="<?php echo $zeile["card_ID"] ?>" name="cardID"/>
                                    <input class="btn btn-warning" name="deleteSubmit" type="submit" value="Karte löschen">
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
