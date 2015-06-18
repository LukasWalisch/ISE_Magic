<html>
<head>
    <title>Test</title>
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: Lukas Walisch
 * Date: 18.06.2015
 * Time: 10:17
 */

$servername = "isemagic.duckdns.org";
$username = "lukas";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";





?>
</body>

</html>