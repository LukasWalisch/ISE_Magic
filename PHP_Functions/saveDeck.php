<?php
// deckName und deckArray
include "mySqlConnect.php";
$sqldelete = "DELETE FROM  card_deck WHERE deckname='$deckName'";
mysqli_query($sqlConnection, $sqldelete);
session_start();
$username = $_SESSION["username"];
foreach ($deckArray as $singleDeckEntry)
{
    $sqlSingleCard = "SELECT card_ID FROM Card WHERE name='$singleDeckEntry'";
    $sqlSingleCardResult = mysqli_query($sqlConnection, $sqlSingleCard);
    $reihe = mysqli_fetch_array($sqlSingleCardResult, MYSQL_ASSOC);
    $cardID = $reihe["card_ID"];
    $sqlsave = "INSERT INTO card_deck(card_ID,deckname) VALUES ('$cardID','$deckName')";
    mysqli_query($sqlConnection, $sqlsave);
}
$sqlSaveDeckQuery = "UPDATE Deck SET cardcount='$cardCounter' WHERE deckname='$deckName'";
mysqli_query($sqlConnection, $sqlSaveDeckQuery);
