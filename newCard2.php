<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8">
	<title>Navigation</title>
</head>
<body>
	<?php if ($_POST["cardType"] == NULL) return; ?>
	<h1>New <?php echo $_POST["cardType"] ?> </h1>
	<form action="persist.php" method="post">
		Cardname: 		<input type="text" name="cardName"><br/>
		Rarity: 		<select name="rarity" size="1"> 
							<option>Common</option>
							<option>Uncommon</option>
							<option>Rare</option>
							<option>Mythic</option>
						</select>
		<br/>
		Legendary: 		<input type="checkbox" name="legendary">
		<br/>
		Edition: 		<input type="text" name="edition">
		<br/>
		Color: 			<input type="text" name="color"> R = Red, B = Black, U = Blue, G = Green, W = White, N = Colorless
		<br/>
		Manacosts: 		<input type="text" name="color"> Example 2 Red and 2 Colorless = RR2, Example 1 Red one Black 3 Colorless = RB3
		<br/>
		Combines with: 	<input type="text" name="combine">
		<br/>
		Duplicates: 	<input type="text" name="duplicate">
		<br/>
		<?php
			for($count = 1; $count <= $_POST["Number"]; $count++)
			{
				?>
				Cardeffect: <?php echo $count; ?>:
				<br/>
					Effect: <input type="text" name="effect<?php echo $count;?>" size="200">
					<br/>
					Manacost: <input type="text" name="effectCost<?php echo$count;?>"> T = Tap, Example 1 Blue, 2 Colorless and Tap = U2T, If its a Planeswalker, type the amount of lifeloss or lifegain for the Planeswalker.
					If no Manacosts wirte 0.
					<br/>
					<br/>
				<?php
			}
		?>
		<br/>
		<br/>
		<?php
			if ($_POST["cardType"] == "Creature")
			{
				?>
				Attack: 		<input type="text" name="attack">
				<br/>
				Defense:		<input type="text" name="defens">
				<br/>
				Creaturetype:	<input type="text" name="creatureType">
				<br/>
				Static Effect: (Hold down CTRL for multi choice)<br/> 	
								<select multiple>
									<option value="Deathtouch">Deathtouch</option>
									<option value="Defender">Defender</option>
									<option value="Double Strike">Double Strike</option>
									<option value="First Strike">First Strike</option>
									<option value="Flash">Flash</option>
									<option value="Flying">Flying</option>
									<option value="Haste">Haste</option>
									<option value="Hexproof">Hexproof</option>
									<option value="Indestructible">Indestructible</option>
									<option value="Intimidate">Intimidate</option>
									<option value="Lifelink">Lifelink</option>
									<option value="Reach">Reach</option>
									<option value="Shroud">Shroud</option>
									<option value="Trample">Trample</option>
									<option value="Vigilance">Vigilance</option>
								</select>
				<?php
			} else if ($_POST["cardType"] == "Spell")
			{
				?>
				Spelltype: <select name="spellType" size="1">
								<option>Instant</option>
								<option>Sourcery</option>
								<option>Artefact</option>
								<option>Enchantment</option>
								<option>Enchantment-Aura</option>
								<option>Enchantment-Aura Curse</option>
								<option>Enchantment-Artefact</option>
								<option>Enchant-Land</option>
							</select>
				<?php
			} else if ($_POST["cardType"] == "Planeswalker")
			{
				?>
				Life: <input type="text" name="life">
				<?php
			}
			?>
	</form>
</body>
</html>
