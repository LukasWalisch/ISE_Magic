<?php

include "mySqlConnect.php"; //sqlConnection Parameter
$sql = "SELECT * FROM Card INNER JOIN Manacost ON Card.manacost_ID = Manacost.ID "; //Einfügen der Query Abfrage
$cardFoundQuery = mysqli_query($sqlConnection, $sql);
