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

            <h3>Neue Karte: <?php echo $_POST["cardType"] ?></h3>

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
                        <img onclick="incrementBlackMana()" src="bilder/Black_Mana.png" alt="blackmana">
                        <br>
                        <input class="form-control mana-font-size" type="text" value="0" Id="blackTextField" name="blackTextField" readonly>
                    </div>
                    <div class="col-xs-1">
                        <img onclick="incrementWhiteMana()" src="bilder/White_Mana.png" alt="whitemana">
                        <br>
                        <input class="form-control mana-font-size" type="text" value="0" Id="whiteTextField" name="whiteTextField" readonly>
                    </div>
                    <div class="col-xs-1">
                        <img onclick="incrementBlueMana()" src="bilder/Blue_Mana.png" alt="bluemana">
                        <br>
                        <input class="form-control mana-font-size" type="text" value="0" Id="blueTextField" name="blueTextField" readonly>
                    </div>
                    <div class="col-xs-1">
                        <img onclick="incrementGreenMana()" src="bilder/Green_Mana.png" alt="greenmana">
                        <br>
                        <input class="form-control mana-font-size" type="text" value="0" Id="greenTextField" name="greenTextField" readonly>
                    </div>
                    <div class="col-xs-1">
                        <img onclick="incrementRedMana()" src="bilder/Red_Mana.png" alt="redmana">
                        <br>
                        <input class="form-control mana-font-size" type="text" value="0" Id="redTextField" name="redTextField" readonly>
                    </div>
                    <div class="col-xs-1">
                        <img onclick="incrementColorlessMana()">Colorless mana +</button>
                        <br>
                        <input class="form-control mana-font-size" type="text" value="0" Id="colorlessTextField" name="colorlessTextField" readonly>
                    </div>
                </div>

                <?php
                for($count = 1; $count <= $_POST["Number"]; $count++)
                {
                    ?>

                    <div class="row">
                        <div class="col-xs-6">
                            <h3>Karteneffekt <?php echo $count; ?> : </h3>
                            <textarea class="form-control" name="effect[]" rows="4" placeholder="Fähigkeit"></textarea>
                            <br/>
                            <br/>
                        </div>
                    </div>

                    <?php
                }
                ?>

                <input  class="btn btn-primary" type="submit" name="Karte erstellen">
            </form>
        </div>
    </div>

    <?php


    if (isset($_POST["submit"]))
    {
        // Create connection
        $conn = mysqli_connect("isemagic.duckdns.org", "lukas", "", "isemagic");
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

        $manacostQuery = "INSERT INTO Manacost (red, blue, green, white, black, colorless) VALUES ('$postRed', '$postBlue', '$postGreen', '$postWhite', '$postBlack', '$postColorless')";

        mysqli_query($conn, $manacostQuery);

        // Letzter eintrag ist die manacost_id der neuen karte
        $maxManacostQuery = "SELECT MAX(ID) AS ID FROM Manacost";

        // ein einzelens result wird in eine variable gespeichert
        $result = mysqli_query($conn, $maxManacostQuery);

        $manacostID = mysqli_fetch_assoc($result)["ID"];

        $postCardname = $_POST["cardname"];
        $postRarity = $_POST["rarity"];
        $postLegendary = $_POST["legendary"];

        // wenn nicht ausgewählt dann speichere "nein" in die Datenbank
        if ($postLegendary == "")
            $postLegendary = "nein";

        if($postCardname == "")
        {
            ?>

            <div class="container">
                <div class="alert alert-danger text-center" role="alert">Falsche Eingabe!</div>
            </div>

            <?php
        }
        else
        {
            $query = "INSERT INTO Test (name, rarity, legendary, manacost_ID) VALUES ('$postCardname', '$postRarity', '$postLegendary', '$manacostID')";

            mysqli_query($conn, $query);
            echo "erfolgreich gespeichert";
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