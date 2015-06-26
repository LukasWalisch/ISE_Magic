<?php
include "mySqlConnect.php"; //sqlConnection Parameter
$sql = "SELECT * FROM Deck"; //Einfügen der Query Abfrage
$deckFoundQuery = mysqli_query($sqlConnection, $sql);