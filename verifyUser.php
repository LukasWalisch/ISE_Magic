<?php
/**
 * Created by PhpStorm.
 * User: Lukas Walisch
 * Date: 22.06.2015
 * Time: 13:12
 */

// Create connection
$conn = mysqli_connect("isemagic.duckdns.org", "lukas", "", "isemagic");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$postUser = $_POST["username"];
$postPassword = $_POST["password"];

$query = "SELECT * FROM User WHERE username = '$postUser' AND password = '$postPassword'";

$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) == 1)
{
    header("Location: navigation.php");
    die();
}

else
{
    header("Location: index.html");
    ?>

    <script>alert("success!!");</script>

    <?php

    die();
}

?>