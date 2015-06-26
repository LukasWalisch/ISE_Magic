<?php
// deckName und deckArray
include "mySqlConnect";
$sqldelete = "DELETE FROM  card_deck WHERE deckname=$deckName";
mysqli_query($sqlConnection, $sqldelete);
foreach ($deckArray as $singleDeckEntry)
{

}