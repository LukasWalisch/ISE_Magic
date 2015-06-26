<?php
// deckName und deckArray
include "mySqlConnect.php";
$sqldelete = "DELETE FROM  card_deck WHERE deckname='$deckName'";
mysqli_query($sqlConnection, $sqldelete);
foreach ($deckArray as $singleDeckEntry)
{
    $sqlsave = "INSERT INTO card_deck(cardname,deckname) VALUES ('$singleDeckEntry','$deckName')";
    mysqli_query($sqlConnection, $sqlsave);
}
echo "Karte wurde gespeichert";