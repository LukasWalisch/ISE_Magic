<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="SS15 IS Engineering (PR), Universitaet Wien">
    <meta name="author" content="Team 13">

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="bootstrap/main.css" rel="stylesheet">


    <title>Deck editor</title>
</head>
<body>



    <?php include_once "header.php";

    $searchArray = $_POST["directedSearchArray"];
    $deckArray = $_POST["directedDeckArray"];
    $cardCounter = $_POST["cardCounter"];
    $deckName = $_POST["selectedDeck"];
    if (!$cardCounter) $cardCounter = 0;

    if ( isset ( $_POST["addRedSubmit"]))
    {
        $cardCounter += 1;
        $deckArray[] = "Rotes Land";
        $searchArray = $_POST["directedSearchArray"];
    }

    if ( isset ( $_POST["addBlueSubmit"]))
    {
        $cardCounter += 1;
        $deckArray[] = "Blaues Land";
        $searchArray = $_POST["directedSearchArray"];
    }

    if ( isset ( $_POST["addGreenSubmit"]))
    {
        $cardCounter += 1;
        $deckArray[] = "Grünes Land";
        $searchArray = $_POST["directedSearchArray"];
    }

    if ( isset ( $_POST["addWhiteSubmit"]))
    {
        $cardCounter += 1;
        $deckArray[] = "Weißes Land";
        $searchArray = $_POST["directedSearchArray"];
    }

    if ( isset ( $_POST["addBlackSubmit"]))
    {
        $cardCounter += 1;
        $deckArray[] = "Schwarzes Land";
        $searchArray = $_POST["directedSearchArray"];
    }



    if ( isset ( $_POST["removeCardSubmit"]))
    {
        $cardCounter = $_POST["cardCounter"];
        if (!(empty($_POST["cardInDeckSelect"])))
        {
            $cardCounter = $_POST["cardCounter"];
            $cardCounter -= 1;
            if (($key = array_search($_POST["cardInDeckSelect"], $deckArray)) !== false) {
                unset($deckArray[$key]);
            }
        }
        $searchArray = $_POST["directedSearchArray"];
    }
    if ( isset ( $_POST["addCardSubmit"]))
    {
        $cardCounter = $_POST["cardCounter"];
        if (!(empty($_POST["cardSelect"])))
        {
            $cardCounter += 1;
            $deckArray[] = $_POST["cardSelect"];
        }
        $searchArray = $_POST["directedSearchArray"];
    }


    if ( isset ( $_POST["saveDeck"]))
    {
        include "PHP_Functions/saveDeck.php";
    }
    //If a Deck was selected from deckbuilder, its loaded in this if Condition.
    if ( isset ($_POST["updateDeck"]))
    {
        if (!$deckName)
        {
            ?>
            <div class="container field">
            <h4 style="text-align: center">Kein Deck ausgewählt, zurück zu Deckbuilder</h4>
            <br/>
                <form action="deckbuilder.php" method="post">
                    <center>
                    <input class="btn btn-primary" type="submit" value="Zurück"/>
                        </center>
                </form>
            </div>
            <?php
            include_once "footer.php";
            die();
        }
        $deckArray = array();
        include "PHP_Functions/loadDeck.php";
        $deckName = $_POST["selectedDeck"];
    }
    if ( isset( $_POST['createDeck'] ) )
    {
        $conn = mysqli_connect("localhost", "root", "", "isemagic");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $deckName = $_POST["deckName"];
        $description = $_POST["description"];
        $CardCounter = 0;
        session_start();
        $username = $_SESSION["username"];
        $sqlDeckQuery = "INSERT INTO Deck(deckname, description, creaturecount, spellcount, landcount, planeswalkercount, cardcount, username) VALUES ('$deckName','$description',0,0,0,0,0,'$username')";
        mysqli_query($conn, $sqlDeckQuery);

    }
    ?>
    <div class="container field">
        <h2 class="item-title">Deckname: <?php echo $deckName ?></h2>
        <div class="row">
            <div class="col-xs-5">
                <h4>Vorhandene Karten</h4>
                <?php
                if ( isset( $_POST['submitSearch'] ) )
                {
                    $checkType = $_POST["checkType"];
                    $nameString = $_POST["searchName"];
                    $checkColor = $_POST["checkColor"]; //Array

                    include "PHP_Functions/searchCard.php"; //Returns cardFoundQuery.
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
                            $searchArray[] = $zeile["name"];
                        }
                    }
                }
                ?>
                <!-- ALLE KARTEN ANZEIGEN -->
                <div>
                    <form action="editDeck.php" method="post">
                        <select class="form-control" style="width: 300px" name="cardSelect" size="20">
                            <?php
                                foreach ($searchArray as $singleResult)
                                {
                                    echo "<option>";
                                    echo $singleResult;
                                    echo "</option>";
                                }
                            ?>

                        </select>
                        <?php
                            foreach ($deckArray as $singleDeck)
                            {
                                ?>
                                <input type="hidden" name="directedDeckArray[]" value="<?php echo $singleDeck; ?>"/>
                                <?php
                            }
                            foreach ($searchArray as $singleSearch)
                            {
                                ?>
                                <input type="hidden" name="directedSearchArray[]" value="<?php echo $singleSearch; ?>"/>
                                <?php
                            }
                        ?>

                </div>
                    <div class=col-xs-6">
                        <h4>Name:</h4>

                        <input class="form-control" type="text" name="searchName" style="width: 300px">

                        <br>
                        <h4>Farbe:</h4>
                        <div class="row">
                            <div class="col-xs-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="checkColor[]" value="red"><img src="bilder/Red_Mana.png" alt="redmana">
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="checkColor[]" value="blue"><img src="bilder/Blue_Mana.png" alt="bluemana">
                                    </label>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="checkColor[]" value="black"><img src="bilder/Black_Mana.png" alt="blackmana">
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="checkColor[]" value="green"><img src="bilder/Green_Mana.png" alt="greenmana">
                                    </label>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="checkColor[]" value="white"><img src="bilder/White_Mana.png" alt="whitemana">
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="checkColor[]" value="colorless"><img src="bilder/Colorless_Mana.png" alt="colorlessmana" width="27" height="auto">
                                    </label>
                                </div>
                            </div>
                        </div>

                        <h4>Kartentyp:</h4>
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="checkType[]" value="Creature"> Kreatur
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="checkType[]" value="Spell"> Zauber
                                    </label>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="checkType[]" value="Planeswalker"> Planeswalker
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="checkType[]" value="Land"> Land
                                        <p> </p>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" value="<?php echo $deckName ?>" name="selectedDeck">
                        <input type="hidden" name="cardCounter" value="<?php echo $cardCounter?>"/>
                        <input class="btn btn-primary" type="submit" value="Suchen" name="submitSearch">
                    </div>

            </div>
            <div class="col-xs-1" style="margin-top: 3em">
                <!-- BUTTONS -->

                <input class="btn btn-default" type="submit" value=">>" name="addCardSubmit"><br>
                <input class="btn btn-default" type="submit" value="<<" name="removeCardSubmit"><br>
                <input class="btn btn-default" type="submit" value="Rotes Land" name="addRedSubmit"><br>
                <input class="btn btn-default" type="submit" value="Blaues Land" name="addBlueSubmit"><br>
                <input class="btn btn-default" type="submit" value="Schwarzes Land" name="addBlackSubmit"><br>
                <input class="btn btn-default" type="submit" value="Grünes Land" name="addGreenSubmit"><br>
                <input class="btn btn-default" type="submit" value="Weißes Land" name="addWhiteSubmit"><br>

            </div>
            <div class="col-xs-5 col-md-offset-1">
                <!-- DECKS -->
                <h4><?php echo $deckName?></h4>
                <div>
                    <select class="form-control" style="width: 300px" name="cardInDeckSelect" size="20">
                        <?php
                        foreach ($deckArray as $singleResult)
                        {
                            echo "<option>";
                            echo $singleResult;
                            echo "</option>";
                        }
                        ?>

                    </select>
                    </br>
                    Anzahl Karten: <?php echo $cardCounter ?> </br>
                    <br>
                    <input class="btn btn-primary" type="submit" name="saveDeck" value="Speichere Deck">
                </div>
                    </form>
            </div>
        </div>

        <div class="col-xs-12">
            <!-- INFOFELD -->
            test 4
        </div>
    </div>




    <?php include_once "footer.php"; ?>


    <!-- Bootstrap core JavaScript && jquery -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

</body>
</html>