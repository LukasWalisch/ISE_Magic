<!--
 * Created by PhpStorm.
 * User: jenny
 * Date: 22.06.15
 * Time: 17:40
 -->

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="SS15 IS Engineering (PR), Universitaet Wien">
    <meta name="author" content="Team 13">

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="bootstrap/main.css" rel="stylesheet">


    <title>Magic Karten Datenbank</title>
</head>
<body>
    <div class="container">
        <!-- Navigation -->
        <nav class="navbar navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="navigation.php">
                        <img src="bilder/magiclogo.png" alt="magiclogo"  width="115" height="auto">
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a class="data-nav-item" href="newCard.php">Karte eintragen</a></li>
                        <li><a class="data-nav-item" href="#">Karten anzeigen</a></li>
                        <li><a class="data-nav-item" href="deckbuilder.php">Deckbuilder</a></li>
                        <li><a class="data-nav-item" href="info.php">Info</a></li>
                    </ul>

                </div>
            </div>
        </nav>
        <!-- NAVIGATION ENDE -->

        <!-- TITEL -->
        <div class="row">
            <div class="col-xs-4">
                <img src="bilder/symbols.jpg" alt="Mana Symbole" width="270" height="auto">
            </div>
            <div class="col-xs-8">
                <div class="data-title">
                    <h1>ISE Magic Karten Database</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript && jquery -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

</body>
</html>