<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8">
	<title>New Card</title>
</head>
<body>
	Is the Card a Creature, a Spell, a Planeswalker or a Land?<br/>
	<form action="newCard2.php" method="post">
		<input type="radio" name="cardType" value="Creature">Creature    
		<input type="radio" name="cardType" value="Spell">Spell  
		<input type="radio" name="cardType" value="Planeswalker">Planeswalker
		<input type="radio" name="cardType" value="Land">Land
		<br/>
	How many cardeffects does the card contain? (Static effects doesn´t count. See here for possible static effects:
		<a href="Eigenschaften.html" target="_blank">Static effects</a>)
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
