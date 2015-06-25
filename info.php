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


    <title>Info</title>
</head>
<body>
    <?php include_once "header.php"; ?>
    <div class="container">
        <div class="col-md-4" style="padding-right:20px; border-right: 1px solid #ccc;">
            <h2>Statische Effekte</h2>
            Deathtouch<br/>
            Defender<br/>
            Double Strike<br/>
            First Strike<br/>
            Flash<br/>
            Flying<br/>
            Haste<br/>
            Hexproof<br/>
            Indestructible<br/>
            Intimidate<br/>
            Lifelink<br/>
            Reach<br/>
            Shroud<br/>
            Trample<br/>
            Vigilance<br/>
        </div>
        <div class="col-md-8">
            <h2>Beschreibung der Fähigkeiten</h2>
            Sollte eine Fähigkeit einer Karte Manakosen besitzen werden sie wie folgt eingetrage:<br/>
            Pro farbiges Mana wird der Anfangsbuchstabe angegeben<br/>
            (B = Black, U = Blue, R = Red, W = White, G = Green)<br/>
            Farbloses Mana wird mit der Zahl eingegeben.<br/>
            Soll die Karte dabei getappt werden, so wird ein ,T nach den Manakosten angegeben<br/>
            Sind die Manakosten fertiggebaut wird noch ein : angehängt</br>
            Beispiel: 2 Rote Mana, 1 Farbloses und tappen -> "RR1,T: "
        </div>
        <div class="col-md-4">

        </div>

    </div>
    <?php include_once "footer.php"; ?>


    <!-- Bootstrap core JavaScript && jquery -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>


</body>
</html>