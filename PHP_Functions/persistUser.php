<?php
/**
 * Created by PhpStorm.
 * User: Lukas Walisch
 * Date: 22.06.2015
 * Time: 11:37
 */

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "isemagic";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$postUser = $_POST["username"];
$postPassword = $_POST["password"];

$sql = "INSERT INTO User (username, password)
VALUES ('$postUser', '$postPassword')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
?>

<script>alert("success!!");</script>

<?php

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>