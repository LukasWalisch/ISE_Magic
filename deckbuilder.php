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

    <div class="container">
        <div class="col-xs-12 field">
            <h2 class="item-title">Deckbuilder</h2>

            <!-- VERFUEGBARE DECKS BEARBEITEN -->
            <form class="form-group" action="editDeck.php" method="post">
                <h3>Verfügbare Decks:</h3>
                <br>
                <div class="dropdown">
                    <select style="width: 300px" name="selectedDeck">
                    <?php
                        include "PHP_Functions/searchDeck.php";
                        while ($zeile = mysqli_fetch_array($deckFoundQuery, MYSQL_ASSOC))
                        {
                            echo "<option>". $zeile["deckname"] . "</option>";
                        }
                    ?>

                    </select>
                </div>
                <br>
                <input class="btn btn-primary" type="submit" value="Bearbeiten">
            </form>

            <!-- NEUES DECK HINZUFUEGEN -->
            <form class="form-group" action="editDeck.php" method="post">
                <h3>Neues Deck hinzufügen</h3>

                <div class="row">
                    <div class="col-xs-4">
                        <input type="text" name="deckName" class="form-control" placeholder="Deckname">
                        <br>
                        <input type="text" name="description" class="form-control" placeholder="Beschreibung">
                        <br>
                        <input type="submit" name = "createDeck" value="Erstellen" class="btn btn-primary" >
                    </div>

                    <div class="col-xs-8">

                    </div>
                </div>

            </form>

        </div>

    </div>



    <?php include_once "footer.php"; ?>


    <!-- Bootstrap core JavaScript && jquery -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

</body>
</html>