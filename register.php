<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="SS15 IS Engineering (PR), Universitaet Wien">
    <meta name="author" content="Team 13">

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="bootstrap/main.css" rel="stylesheet">


    <title> Registrierung </title>
</head>
<body>
<div class="container">

    <!-- Navigation -->
    <nav class="navbar navbar-static-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html">
                    <img src="bilder/magiclogo.png" alt="magiclogo"  width="115" height="auto">
                </a>
            </div>
        </div>
    </nav>


    <div class="row">
        <div class="col-xs-5 col-md-offset-1">
            <img src="bilder/loginlogo.png" alt="logo" id="loginlogo">

        </div>
        <div class="col-xs-5" id="login">
            <form action="PHP_Functions/persistUser.php" method="post" class="form-signin">
                <h3 class="form-signin-heading">Registrieren</h3>
                <input type="text" name="username" class="form-control" placeholder="Username">
                <br>
                <input type="password" name="password" class="form-control" placeholder="Passwort">
                <br>

                <button class="btn btn-primary" type="submit" name="submit" value="Registrieren">Registrieren</button>
            </form>
        </div>
    </div>
</div>

<!-- FUSSZEILE -->
<?php include_once "footer.php"; ?>

<!-- Bootstrap core JavaScript && jquery -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<?php

if (isset($_POST["submit"]))
{
    // Create connection
    $conn = mysqli_connect("localhost", "root", "", "isemagic");
    // Check connection
    if (!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }

    $postUser = $_POST["username"];
    $postPassword = $_POST["password"];

    $query = "INSERT INTO User (username, password) VALUES ('$postUser', '$postPassword')";
    mysqli_query($conn, $query);

    $query = "SELECT card_ID FROM Card WHERE name = 'Rotes Land'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $cardID = $row["card_ID"];

    if (!$cardID)
    {
        $query = "INSERT INTO Card (name, rarity, legendary, cardtype, username) VALUES ('Rotes Land', 'Common', 'nein', 'Land', '$postUser')";
        mysqli_query($conn, $query);

        $query = "INSERT INTO Card (name, rarity, legendary, cardtype, username) VALUES ('Grünes Land', 'Common', 'nein', 'Land', '$postUser')";
        mysqli_query($conn, $query);

        $query = "INSERT INTO Card (name, rarity, legendary, cardtype, username) VALUES ('Blaues Land', 'Common', 'nein', 'Land', '$postUser')";
        mysqli_query($conn, $query);

        $query = "INSERT INTO Card (name, rarity, legendary, cardtype, username) VALUES ('Weißes Land', 'Common', 'nein', 'Land', '$postUser')";
        mysqli_query($conn, $query);

        $query = "INSERT INTO Card (name, rarity, legendary, cardtype, username) VALUES ('Schwarzes Land', 'Common', 'nein', 'Land', '$postUser')";
        mysqli_query($conn, $query);
    }

    header("Location: login.php");

}

?>

</body>
</html>