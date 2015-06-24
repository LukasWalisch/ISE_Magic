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

	<title>Navigation</title>
</head>
<body>

    <?php include_once "header.php"; ?>

    <div class="container">
        <div class="col-xs-12 field">
            <!-- SUCHFUNKTION -->
            <form action="foundCards.php" method="post">
                <h2 class="item-title">Karte Suchen</h2>

                <input type="text" class="form-control" placeholder="Karte suchen">
                <br/>

                <div class="row">
                    <div class="col-xs-5">
                        <img src="bilder/jacebeleren.jpeg" alt="jacebeleren">
                    </div>
                    <div class="col-xs-6">
                        <h3>Kartentyp:</h3>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="checkCardType[]" value="Creatur"> Kreatur
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="checkCardType[]" value="Spell"> Zauber
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="checkCardType[]" value="Planeswalker"> Planeswalker
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="checkCardType[]" value="Land"> Land
                                <p> </p>
                            </label>
                        </div>
                    </div>
                </div>
                <div class=""

                <input class="btn btn-primary" type="submit" value="Suchen">

            </form>

            <div class="col-xs-12">
                <p> </p>
            </div>

        </div>
    </div>


    <?php include_once "footer.php"; ?>
</body>
</html>
