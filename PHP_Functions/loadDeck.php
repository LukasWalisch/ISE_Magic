<?php
include "mySqlConnect.php";
echo $deckName;
$sqlQueryForDeck = "SELECT cardname FROM Deck INNER JOIN card_deck ON card_deck.deckname = Deck.deckname  WHERE card_deck.deckname='$deckName'";
$sqlDeckResult = mysqli_query($sqlConnection, $sqlQueryForDeck);
while ($zeile = mysqli_fetch_array($sqlDeckResult, MYSQL_ASSOC))
{
    $deckArray[] = $zeile["cardname"];
}
echo "File loaded";