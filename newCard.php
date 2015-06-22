<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="SS15 IS Engineering (PR), Universitaet Wien">
    <meta name="author" content="Team 13">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="main.css" rel="stylesheet">


	<title>New Card</title>
</head>
<body>
    <?php include_once "header.php"; ?>
    <div class="container">
        <div class="col-md-12">
            <form class="form-group" action="newCard2.php" method="post">
                <h3>Wähle den Kartentyp:</h3>
                <button type="button" class="btn btn-default active" name="cardType" value="Creature">Kreatur</button>
                <button type="button" class="btn btn-default active" name="cardType" value="Spell">Verzauberung</button>
                <button type="button" class="btn btn-default active" name="cardType" value="Planeswalker">Planeswalker</button>
                <button type="button" class="btn btn-default active" name="cardType" value="Land">Land</button>
            </form>






        </div>



    </div>





	Is the Card a Creature, a Spell, a Planeswalker or a Land?<br/>
	<form action="newCard2.php" method="post">
		<input type="radio" name="cardType" value="Creature">Creature
		<input type="radio" name="cardType" value="Spell">Spell
		<input type="radio" name="cardType" value="Planeswalker">Planeswalker
		<input type="radio" name="cardType" value="Land">Land
		<br/>
	How many cardeffects does the card contain? (Static effects doesn´t count. See here for possible static effects:
		<a href="staticEffetcs.html" target="_blank">Static effects</a>)
		<br/>
		<select name="Number" size="1">
			<option>0</option>
			<option>1</option>
			<option>2</option>
			<option>3</option>
			<option>4</option>
			<option>5</option>
		</select>
		<br/>
		<br/>
		<input type="submit" value="Next">
	</form>
	<br/>




		
</body>
</html>
