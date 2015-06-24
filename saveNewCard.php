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
    <div class="container">
        <div class="jumbotron">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <input type="text" name="cardname">
                <br>
                <select name="rarity" size="1">
                    <option>Common</option>
                    <option>Uncommon</option>
                    <option>Rare</option>
                    <option>Mythic</option>
                </select>
                <br>
                Legendär: <input type="checkbox" name="legendary" value="ja">
                <br>
                Manakosten:
                <br>
                <button type="button" onclick="incrementBlackMana()">black mana +</button>
                <input type="text" value="0" Id="blackTextField" readonly>
                <br>
                <button type="button" onclick="incrementWhiteMana()">White mana +</button>
                <input type="text" value="0" Id="whiteTextField" readonly>
                <br>
                <button type="button" onclick="incrementBlueMana()">Blue mana +</button>
                <input type="text" value="0" Id="blueTextField" readonly>
                <br>
                <button type="button" onclick="incrementGreenMana()">Green mana +</button>
                <input type="text" value="0" Id="greenTextField" readonly>
                <br>
                <button type="button" onclick="incrementRedMana()">Red mana +</button>
                <input type="text" value="0" Id="redTextField" readonly>
                <br>
                <button type="button" onclick="incrementColorlessMana()">Colorless mana +</button>
                <input type="text" value="0" Id="colorlessTextField" readonly>
                <br>

                <input type="submit" name="submit">
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
            $query = "INSERT INTO Test (name, rarity, legendary) VALUES ('$postCardname', '$postRarity', '$postLegendary')";

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

</body>

</html>