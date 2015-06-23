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

        <!-- SUCHFUNKTION -->
        <form action="newCard.php" method="post">
            <h2>Karte Suchen</h2>

            <div class="col-md-12">
                <input type="text" class="form-control" placeholder="Karte suchen">
            </div>
            <button type="submit" class="btn btn-default">Suchen</button>
        </form>

    </div>
	<form action="newCard.php" method="post">
	<input type="submit" value="New Card">
	</form>

    <?php include_once "footer.php"; ?>
</body>
</html>
