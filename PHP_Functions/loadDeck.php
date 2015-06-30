<?php
include "mySqlConnect.php";
//echo $deckName . " ";
$sqlQueryForDeck = "SELECT card_ID FROM Deck INNER JOIN card_deck ON card_deck.deckname = Deck.deckname  WHERE card_deck.deckname='$deckName'";
$sqlDeckResult = mysqli_query($sqlConnection, $sqlQueryForDeck);
while ($zeile = mysqli_fetch_array($sqlDeckResult, MYSQL_ASSOC))
{
    $singleCard = $zeile["card_ID"];
    $sqlSingleCard = "SELECT name FROM Card WHERE card_ID='$singleCard'";
    $sqlSingleCardResult = mysqli_query($sqlConnection, $sqlSingleCard);
    $reihe = mysqli_fetch_array($sqlSingleCardResult, MYSQL_ASSOC);
    if (!$reihe) echo "NOPE";
    $deckArray[] = $reihe["name"];
}
$sqlQueryForDeckInfo = "SELECT * FROM Deck WHERE deckname = '$deckName'";
$sqlResultForDeckInfo = mysqli_query($sqlConnection, $sqlQueryForDeckInfo);
if (!$sqlResultForDeckInfo) echo "NO RESULT";
$deckInfoRow = mysqli_fetch_array($sqlResultForDeckInfo, MYSQL_ASSOC);
if (!$deckInfoRow) echo "NO INFO ROW";
$cardCounter = count($deckArray);
//echo "Deck loaded";