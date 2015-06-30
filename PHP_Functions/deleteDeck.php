<?php
echo "Hier";
include "mySqlConnect.php";
$deckName = $_POST["selectedDeck"];
$sqlDeleteDeckQuery = "DELETE FROM Deck WHERE deckname='$deckName'";
mysqli_array($sqlConnection,$sqlDeleteDeckQuery);
