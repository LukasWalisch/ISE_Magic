<?php
echo "TESasdadasdasdasdasdT";
include "mySqlConnect.php";
$sqlQueryDeleteCard = "DELETE FROM Card WHERE card_ID='$cardID'";
mysqli_query($sqlConnection, $sqlQueryDeleteCard);
$sqlQueryDeleteConnection = "DELETE FROM card_deck WHERE card_ID='$cardID'";
mysqli_query($sqlConnection, $sqlQueryDeleteConnection);


