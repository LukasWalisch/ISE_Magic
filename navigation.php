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

            <form action="foundCards.php" method="post">
                <h2 class="item-title">Karte Suchen</h2>
                <br>

                <div class="row">
                    <div class="col-xs-3">
                        <img src="bilder/jacebeleren.jpeg" alt="jacebeleren" width="200" height="auto">
                    </div>
                    <div class="col-xs-9">
                        <!-- SUCHFUNKTION -->
                        <input type="text" class="form-control" placeholder="Karte suchen" name="nameString">
                        <br/>
                        <div class="row">
                            <div class="col-xs-6">
                                <h3>Farbe:</h3>
                                <div class="row">
                                    <div class="col-xs-6">
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
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="checkColor[]" value="black"><img src="bilder/Black_Mana.png" alt="blackmana">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="checkColor[]" value="green"><img src="bilder/Green_Mana.png" alt="greenmana">
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="checkColor[]" value="white"><img src="bilder/White_Mana.png" alt="whitemana">
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="checkColor[]" value="colorless"><img src="bilder/Colorless_Mana.png" alt="colorlessmana">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <h3>Kartentyp:</h3>
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
                                <input class="btn btn-primary btn-block" type="submit" value="Suchen">
                            </div>

                        </div>
                    </div>
                </div>

            </form>





            <div class="col-xs-12">
                <p> </p>
            </div>

        </div>
    </div>


    <?php include_once "footer.php"; ?>

    <!-- Bootstrap core JavaScript && jquery -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

</body>
</html>
