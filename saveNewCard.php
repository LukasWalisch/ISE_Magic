<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
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

<div class="container">
    <div class="col-xs-12 field">
        <h2 class="item-title">Karte eintragen</h2>

        <h2 style="color: brown"> <img src="bilder/rueckseite.jpeg" alt="rueckseite" width="40" height="auto">
            <?php
            if ($_POST["cardType"] == "Land"){
                ?> Neues Land  <?php
            }
            if ($_POST["cardType"] == "Creature"){
                ?> Neue Kreatur <?php
            }
            if ($_POST["cardType"] == "Spell"){
                ?> Neuer Zauber <?php
            }
            if ($_POST["cardType"] == "Planeswalker"){
                ?> Neuer Planeswalker <?php
            }
            ?>
        </h2>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="row">
                <div class="col-xs-6">
                    <h3>Kartenname</h3>
                    <input class="form-control" type="text" name="cardname" placeholder="Kartenname">
                    <br>
                    <h3>Seltenheit:</h3>
                    <div class="dropdown">
                        <select  class="btn btn-default btn-lg dropdown-toggle" name="rarity" size="1">
                            <option>Common</option>
                            <option>Uncommon</option>
                            <option>Rare</option>
                            <option>Mythic</option>
                        </select>
                    </div>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="legendary" value="ja"> Legendär
                        </label>
                    </div>
                </div>
            </div>


            <h3>Manakosten:</h3>

            <div class="row">

                <div class="col-xs-1">
                    <img onclick="incrementBlackMana()" src="bilder/Black_Mana.png" alt="blackmana" width="40" height="auto">
                    <br>
                    <input class="form-control mana-font-size" type="text" value="0" Id="blackTextField" name="blackTextField" readonly>
                </div>
                <div class="col-xs-1">
                    <img onclick="incrementWhiteMana()" src="bilder/White_Mana.png" alt="whitemana" width="40" height="auto">
                    <br>
                    <input class="form-control mana-font-size" type="text" value="0" Id="whiteTextField" name="whiteTextField" readonly>
                </div>
                <div class="col-xs-1">
                    <img onclick="incrementBlueMana()" src="bilder/Blue_Mana.png" alt="bluemana" width="40" height="auto">
                    <br>
                    <input class="form-control mana-font-size" type="text" value="0" Id="blueTextField" name="blueTextField" readonly>
                </div>
                <div class="col-xs-1">
                    <img onclick="incrementGreenMana()" src="bilder/Green_Mana.png" alt="greenmana" width="40" height="auto">
                    <br>
                    <input class="form-control mana-font-size" type="text" value="0" Id="greenTextField" name="greenTextField" readonly>
                </div>
                <div class="col-xs-1">
                    <img onclick="incrementRedMana()" src="bilder/Red_Mana.png" alt="redmana" width="40" height="auto">
                    <br>
                    <input class="form-control mana-font-size" type="text" value="0" Id="redTextField" name="redTextField" readonly>
                </div>
                <div class="col-xs-1">
                    <img onclick="incrementColorlessMana()" src="bilder/Colorless_Mana.png" alt="colorlessmana" width="39" height="auto">
                    <br>
                    <input class="form-control mana-font-size" type="text" value="0" Id="colorlessTextField" name="colorlessTextField" readonly>
                </div>

                <input type="hidden" name="cardType" value="<?php echo $_POST["cardType"] ?>"> <!-- Weiterleitung einer Variable an das nächste Form -->
                <input type="hidden" name="Number" value="<?php echo $_POST["Number"] ?>">
            </div>

            <?php
            if ($_POST["cardType"] == "Creature")
            {
                ?>

                Angriff: <input type="text" name="attack">
                <br>
                Verteidigung: <input type="text" name="defense">
                <br>
                <input type="checkbox" name="staticEffects[]" value="Deathtouch">Deathtouch<br>
                <input type="checkbox" name="staticEffects[]" value="Defender">Defender<br>
                <input type="checkbox" name="staticEffects[]" value="Double Strike">Double Strike<br>
                <input type="checkbox" name="staticEffects[]" value="First Strike">First Strike<br>
                <input type="checkbox" name="staticEffects[]" value="Flash">Flash<br>
                <input type="checkbox" name="staticEffects[]" value="Flying">Flying<br>
                <input type="checkbox" name="staticEffects[]" value="Haste">Haste<br>
                <input type="checkbox" name="staticEffects[]" value="Hexproof">Hexproof<br>
                <input type="checkbox" name="staticEffects[]" value="Indestructible">Indestructible<br>
                <input type="checkbox" name="staticEffects[]" value="Intimidate">Intimidate<br>
                <input type="checkbox" name="staticEffects[]" value="Lifelink">Lifelink<br>
                <input type="checkbox" name="staticEffects[]" value="Reach">Reach<br>
                <input type="checkbox" name="staticEffects[]" value="Shroud">Shroud<br>
                <input type="checkbox" name="staticEffects[]" value="Trample">Trample<br>
                <input type="checkbox" name="staticEffects[]" value="Vigilance">Vigilance<br>

            <?php
            }

            if ($_POST["cardType"]  == "Spell")
            {
                ?>

                Zaubertyp: <select name="spellType">
                <option>Spontanzauber</option>
                <option>Verzauberung</option>
                <option>Hexerei</option>
                <option>Verzauberung - Aura</option>
                <option>Artefakt</option>
            </select>

            <?php
            }

            if ($_POST["cardType"] == "Planeswalker")
            {
                ?>

                Lebenspunkte: <input type="text" name="life">

            <?php
            }

            for($count = 1; $count <= $_POST["Number"]; $count++)
            {
                ?>

                <div class="row">
                    <div class="col-xs-6">
                        <h3>Kartenfähigkeit <?php echo $count; ?> : </h3>
                        <textarea class="form-control" name="abilities[]" rows="4" placeholder="Fähigkeit"></textarea>
                        <br/>
                        <br/>
                    </div>
                </div>

            <?php
            }
            ?>

            <input  class="btn btn-primary" type="submit" name="submit" value="Karte erstellen">
        </form>
    </div>
</div>

<?php


if (isset($_POST["submit"]))
{
    // Create connection
    $conn = mysqli_connect("localhost", "root", "", "isemagic");
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $postBlack = $_POST["blackTextField"];
    $postWhite = $_POST["whiteTextField"];
    $postBlue = $_POST["blueTextField"];
    $postGreen = $_POST["greenTextField"];
    $postRed = $_POST["redTextField"];
    $postColorless = $_POST["colorlessTextField"];

    $postCardType = $_POST["cardType"];
    $postCardname = $_POST["cardname"];
    $postRarity = $_POST["rarity"];
    $postLegendary = $_POST["legendary"];
    $postAbilities = $_POST["abilities"];

    // wenn nicht ausgewählt dann speichere "nein" in die Datenbank
    if ($postLegendary == "")
        $postLegendary = "nein";

    $insertSuccess = "";

    if($postCardname == "")
    {
        ?>

        <div class="container">
            <div class="alert alert-danger text-center" role="alert">Falsche Eingabe!</div>
        </div>

        <?php
        $insertSuccess = "false";
    }
    else
    {
        $manacostQuery = "INSERT INTO Manacost (red, blue, green, white, black, colorless) VALUES ('$postRed', '$postBlue', '$postGreen', '$postWhite', '$postBlack', '$postColorless')";
        mysqli_query($conn, $manacostQuery);

        // Letzter eintrag ist die manacost_id der neuen karte
        $maxManacostQuery = "SELECT MAX(ID) AS ID FROM Manacost";

        // ein einzelens result wird in eine variable gespeichert
        $result = mysqli_query($conn, $maxManacostQuery);

        $manacostID = mysqli_fetch_assoc($result)["ID"];

        $query = "INSERT INTO Card (name, rarity, legendary, manacost_ID, cardtype) VALUES ('$postCardname', '$postRarity', '$postLegendary', '$manacostID', '$postCardType')";
        mysqli_query($conn, $query);

        foreach($postAbilities as $ability)
        {
            echo "Beschreibung: " . $ability . " cardname: " . $postCardname;
            $abilityQuery = "INSERT INTO Ability (description, cardname) VALUES ('$ability', '$postCardname')";
            mysqli_query($conn, $abilityQuery);
        }

        $insertSuccess = "true"; // Flag das mir angibt ob die speicherung erfolgt ist
        echo "erfolgreich gespeichert";
        $insertSuccess = "true";
    }

    if ($postCardType == "Creature" and $insertSuccess == "true")
    {
        $postAttack = $_POST["attack"];
        $postDefense = $_POST["defense"];
        $staticEffects = $_POST["staticEffects"];

        $staticEffectString = implode(", ", $staticEffects); // verwandelt ein array in einen String
        echo "TESTSTRING: " . $staticEffectString; //TEST

        $updateQuery  = "UPDATE Card SET attack = '$postAttack' WHERE name = '$postCardname'";
        mysqli_query($conn, $updateQuery);

        $updateQuery  = "UPDATE Card SET defense = '$postDefense' WHERE name = '$postCardname'";
        mysqli_query($conn, $updateQuery);

        $updateQuery  = "UPDATE Card SET staticeffects = '$staticEffectString' WHERE name = '$postCardname'";
        mysqli_query($conn, $updateQuery);
    }

    if ($postCardType == "Spell" and $insertSuccess == "true")
    {
        echo "TEST!!!";
        $postSpellType = $_POST["spellType"];
        $updateQuery = "UPDATE Card SET spelltype = '$postSpellType' WHERE name = '$postCardname'";
    }

    if ($postCardType == "Planeswalker" and $insertSuccess == "true")
    {
        $postLife = $_POST["life"];
        $updateQuery = "UPDATE Card SET life = '$postLife' WHERE name = '$postCardname'";
    }



    mysqli_close($conn);
}


?>

<script>
    var blackMana = 0;
    var whiteMana = 0;
    var blueMana = 0;
    var greenMana = 0;
    var redMana = 0;
    var colorlessMana = 0;

    function incrementBlackMana()
    {
        blackMana += 1;
        var blackTextField = document.getElementById("blackTextField");
        blackTextField.value = blackMana;
    }

    function incrementWhiteMana()
    {
        whiteMana += 1;
        var whiteTextField = document.getElementById("whiteTextField");
        whiteTextField.value = whiteMana;
    }

    function incrementBlueMana()
    {
        blueMana += 1;
        var blueTextField = document.getElementById("blueTextField");
        blueTextField.value = blueMana;
    }

    function incrementGreenMana()
    {
        greenMana += 1;
        var greenTextField = document.getElementById("greenTextField");
        greenTextField.value = greenMana;
    }

    function incrementRedMana()
    {
        redMana += 1;
        var redTextField = document.getElementById("redTextField");
        redTextField.value = redMana;
    }

    function incrementColorlessMana()
    {
        colorlessMana += 1;
        var colorlessTextField = document.getElementById("colorlessTextField");
        colorlessTextField.value = colorlessMana;
    }

</script>

<?php include_once "footer.php"; ?>

<!-- Bootstrap core JavaScript && jquery -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

</body>

</html>