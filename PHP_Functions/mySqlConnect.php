<?php
/**
 * Created by PhpStorm.
 * User: Richi
 * Date: 21.06.2015
 * Time: 15:15
 */
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "isemagic";

// Verbindung zum mySQL Server localhost
$sqlConnection = new mysqli($servername, $username, $password, $dbName);
if ($sqlConnection->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>