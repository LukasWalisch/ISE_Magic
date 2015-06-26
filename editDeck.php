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


    <title>Neue Karte</title>
</head>
<body>


    <?php include_once "header.php"; ?>
    <?php
    $searchArray = array();
    $deckArray = $_POST["directedDeckArray"];
    if ( isset ( $_POST["addCardSubmit"]))
    {
        $deckArray[] =  $_POST["cardSelect"];
        $searchArray = $_POST["directedSearchArray"];
    }
    $deckName = $_POST["selectedDeck"];
    if ( isset( $_POST['createDeck'] ) )
    {
        $conn = mysqli_connect("isemagic.duckdns.org", "lukas", "", "isemagic");
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $deckName = $_POST["deckName"];
        $description = $_POST["description"];
        $sqlDeckQuery = "INSERT INTO Deck(deckname, description) VALUES ('$deckName','$description')";
        mysqli_query($conn, $sqlDeckQuery);

    }
    ?>
    <div class="container field">
        <h2 class="item-title">Deckname: <?php echo $_POST["selectedDeck"]?></h2>
        <div class="row">
            <div class="col-xs-5">
                <?php
                if ( isset( $_POST['submitSearch'] ) )
                {
                    $checkType = $_POST["checkType"];
                    $nameString = $_POST["nameString"];
                    $checkColor = $_POST["checkColor"]; //Array

                    include "PHP_Functions/searchCard.php"; //Returns cardFoundQuery.
                    if(! $cardFoundQuery )
                    {
                        ?>
                        <h2>Keine Ergebnise</h2>
                        <?php
                        die("Keine Ergebnise");
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
                            $searchArray[] = $zeile["name"];
                        }
                    }
                }
                ?>
                <!-- ALLE KARTEN ANZEIGEN -->
                <div>
                    <form action="editDeck.php" method="post">
                        <select style="width: 300px" name="cardSelect" size="20">
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
                        ?>
                </div>
                    <div class=col-xs-6">
                        <h4>Name:</h4>
                        <input type="text" name="searchName">
                        <h4>Farbe:</h4>
                        <input type="checkbox" name="checkColor[]" value="Red"> Rot
                        <input type="checkbox" name="checkColor[]" value="Blue"> Blau
                        <input type="checkbox" name="checkColor[]" value="Black"> Schwarz
                        <input type="checkbox" name="checkColor[]" value="Green"> Grün
                        <input type="checkbox" name="checkColor[]" value="White"> Weiß
                        <input type="checkbox" name="checkColor[]" value="Colorless"> Farblos
                        <br/>
                        <h4>Kartentyp:</h4>
                        <input type="checkbox" name="checkType[]" value="Creatur"> Kreatur
                        <input type="checkbox" name="checkType[]" value="Spell"> Zauber
                        <input type="checkbox" name="checkType[]" value="Planeswalker"> Planeswalker
                        <input type="checkbox" name="checkType[]" value="Land"> Land <br/>
                        <input type="hidden" name="selectedDeck" value="<?php echo $deckName?>">
                        <input type="submit" value="Suchen" name="submitSearch">
                    </div>

            </div>
            <div class="col-xs-2">
                <!-- BUTTONS -->
                <input type="submit" value=">>" name="addCardSubmit">
                </form>
            </div>
            <div class="col-xs-5">
                <!-- DECKS -->
                <div>
                    <select style="width: 300px" name="cardSelect" size="20">
                        <?php
                        foreach ($deckArray as $singleResult)
                        {
                            echo "<option>";
                            echo $singleResult;
                            echo "</option>";
                        }
                        ?>

                    </select>
                </div>
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