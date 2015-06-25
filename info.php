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
        <div class="col-xs-12 field">
            <h2 class="item-title">Informationsseite</h2>


            <div class="list-group">
                <div class="list-group-item">
                    <h4 class="list-group-item-heading">Beschreibung der Fähigkeiten</h4>
                    <p class="list-group-item-text">
                        Sollte eine Fähigkeit einer Karte Manakosten besitzen werden sie wie folgt eingetrage:
                    <ul>
                        <li>Pro farbiges Mana wird der Anfangsbuchstabe angegeben. <br/>
                            (B = Black, U = Blue, R = Red, W = White, G = Green)</li>
                        <li>Farbloses Mana wird mit der Zahl eingegeben.</li>
                        <li>Soll die Karte dabei getappt werden, so wird ein ,T nach den Manakosten angegeben.</li>
                        <li>Sind die Manakosten fertiggebaut wird noch ein : angehängt</br>
                            Beispiel: 2 Rote Mana, 1 Farbloses und tappen -> "RR1,T: "</li>
                    </ul>
                    </p>
                </div>
                <a href="#" class="list-group-item">
                    <h4 class="list-group-item-heading">What is Bootstrap?</h4>
                    <p class="list-group-item-text">Bootstrap is a powerful front-end framework for faster and easier web development. It is a collection of HTML and CSS based design template.</p>
                </a>
                <a href="#" class="list-group-item">
                    <h4 class="list-group-item-heading">What is CSS?</h4>
                    <p class="list-group-item-text">CSS stands for Cascading Style Sheet. CSS allows you to specify various style properties for a given HTML element such as colors, backgrounds, fonts etc.</p>
                </a>
            </div>


            <dl>
                <dt>
                    Sollte eine Fähigkeit einer Karte Manakosten besitzen werden sie wie folgt eingetrage:
                </dt>
                <dd>
                    <ul>
                        <li>Pro farbiges Mana wird der Anfangsbuchstabe angegeben. <br/>
                            (B = Black, U = Blue, R = Red, W = White, G = Green)</li>
                        <li>Farbloses Mana wird mit der Zahl eingegeben.</li>
                        <li>Soll die Karte dabei getappt werden, so wird ein ,T nach den Manakosten angegeben.</li>
                        <li>Sind die Manakosten fertiggebaut wird noch ein : angehängt</br>
                            Beispiel: 2 Rote Mana, 1 Farbloses und tappen -> "RR1,T: "</li>
                    </ul>
                </dd>
            </dl>


            Sollte eine Fähigkeit einer Karte Manakosten besitzen werden sie wie folgt eingetrage:<br/>
            <ul>
                <li>Pro farbiges Mana wird der Anfangsbuchstabe angegeben. <br/>
                    (B = Black, U = Blue, R = Red, W = White, G = Green)</li>
                <li>Farbloses Mana wird mit der Zahl eingegeben.</li>
                <li>Soll die Karte dabei getappt werden, so wird ein ,T nach den Manakosten angegeben.</li>
                <li>Sind die Manakosten fertiggebaut wird noch ein : angehängt</br>
                    Beispiel: 2 Rote Mana, 1 Farbloses und tappen -> "RR1,T: "</li>
            </ul>


        </div> 

    </div>
    <?php include_once "footer.php"; ?>


    <!-- Bootstrap core JavaScript && jquery -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>


</body>
</html>
