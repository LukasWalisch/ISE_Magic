<?php

//Setzen der Parameter für die Funktion



//Wiederholbare Funktion
include "mySqlConnect.php"; //sqlConnection Parameter
$sql = "SELECT * FROM Card"; //Einfügen der Query Abfrage
$cardFoundQuery = mysqli_query($sqlConnection, $sql);


//Ende der Funktion