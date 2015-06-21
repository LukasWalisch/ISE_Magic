<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8">
	<title>Navigation</title>
</head>
<body>
Hallo1

	<?php
        if ($_POST["username"] != "admin" && $_POST["password"] != "admin")
        {
           include("Fail.html");
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
