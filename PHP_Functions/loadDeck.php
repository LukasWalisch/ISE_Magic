<?php
include "mySqlConnect.php";
//echo $deckName . " ";
$sqlQueryForDeck = "SELECT cardname FROM Deck INNER JOIN card_deck ON card_deck.deckname = Deck.deckname  WHERE card_deck.deckname='$deckName'";
$sqlDeckResult = mysqli_query($sqlConnection, $sqlQueryForDeck);
while ($zeile = mysqli_fetch_array($sqlDeckResult, MYSQL_ASSOC))
{
    $deckArray[] = $zeile["cardname"];
}
$sqlQueryForDeckInfo = "SELECT * FROM Deck WHERE deckname = '$deckName'";
$sqlResultForDeckInfo = mysqli_query($sqlConnection, $sqlQueryForDeckInfo);
if (!$sqlResultForDeckInfo) echo "NO RESULT";
$deckInfoRow = mysqli_fetch_array($sqlResultForDeckInfo, MYSQL_ASSOC);
if (!$deckInfoRow) echo "NO INFO ROW";
$cardCounter = $deckInfoRow["cardcount"];
//echo "Deck loaded";