<?php

include "mySqlConnect.php"; //sqlConnection Parameter
session_start();
$username = $_SESSION["username"];
$sql = "SELECT * FROM Card INNER JOIN Manacost ON Manacost.card_ID = Card.card_ID AND Card.username = '$username'"; //Einfügen der Query Abfrage
$cardFoundQuery = mysqli_query($sqlConnection, $sql);
