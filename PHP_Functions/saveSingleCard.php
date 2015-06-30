<?php
include "mySqlConnect.php";
$sqlQuerySaveCard = "INSERT INTO card_deck (cardname,deckname) VALUES ('$cardName', '$deckName')";
$sqlQueryIncrement = "UPDATE Deck SET cardcount = cardcount + 1 WHERE deckname='$deckName'";
mysqli_query($sqlConnection, $sqlQuerySaveCard);
mysqli_query($sqlConnection, $sqlQueryIncrement);