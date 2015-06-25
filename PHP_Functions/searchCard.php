<?php

include "mySqlConnect.php"; //sqlConnection Parameter
$sql = "SELECT * FROM Card"; //Einfügen der Query Abfrage
$cardFoundQuery = mysqli_query($sqlConnection, $sql);
