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
    <div class="container">
        <!-- SUCHFUNKTION -->
        <div class="col-md-12">

        </div>
    </div>







Hallo1

	<?php
        if ($_POST["username"] != "admin" && $_POST["password"] != "admin")
        {
           include("error.html");
            return;
        }


		$card = $_GET["Kartenname"];
		if ($card != NULL)
		{
			echo "Angelegte Karte: ".$card;
		}
	?>
	<form action="newCard.php" method="post">
	<input type="submit" value="New Card">
	</form>
</body>
</html>
