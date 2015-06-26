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
            <h2 class="item-title">Karte eintragen</h2>

            <form class="form-group" action="saveNewCard.php" method="post">
                <h3>Wähle den Kartentyp:</h3>
                <div class="radio">
                    <label>
                        <input type="radio" name="cardType" value="Creature"> Kreatur
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="cardType" value="Spell"> Zauber
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="cardType" value="Planeswalker"> Planeswalker
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="cardType" value="Land"> Land
                    </label>
                </div>


                <h3>Wähle die Anzahl der Karteneffekte:</h3>
                <div class="dropdown">
                    <select class="btn btn-default btn-lg dropdown-toggle" name="Number" size="1">
                        <option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <br>
                <ul class="list-group">
                    <li class="list-group-item glyphicon glyphicon-info-sign"> Statische Effekte die NICHT zählen:</li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-xs-4">
                                Deathtouch<br/>
                                Defender<br/>
                                Double Strike<br/>
                                First Strike<br/>
                                Flash<br/>
                            </div>
                            <div class="col-xs-4">
                                Flying<br/>
                                Haste<br/>
                                Hexproof<br/>
                                Indestructible<br/>
                                Intimidate<br/>
                            </div>
                            <div class="col-xs-4">
                                Lifelink<br/>
                                Reach<br/>
                                Shroud<br/>
                                Trample<br/>
                                Vigilance<br/>
                            </div>
                        </div>
                    </li>
                </ul>
                <br>
                <input class="btn btn-primary" type="submit" value="Weiter">

            </form>
        </div>

        <div class="col-xs-12">

        </div>

    </div>

    <?php include_once "footer.php"; ?>

        <!-- Bootstrap core JavaScript && jquery -->
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

</body>
</html>