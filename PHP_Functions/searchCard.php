<?php

include "mySqlConnect.php"; //sqlConnection Parameter
$sql = "SELECT * FROM Test INNER JOIN Manacost ON Test.manacost_ID = Manacost.ID "; //Einfügen der Query Abfrage
$cardFoundQuery = mysqli_query($sqlConnection, $sql);
