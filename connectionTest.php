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

if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {
    echo 'no mysqli :(';
} else {
    echo 'we gots it';
}

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