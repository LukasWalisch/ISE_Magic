
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="SS15 IS Engineering (PR), Universitaet Wien">
    <meta name="author" content="Team 13">

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="bootstrap/main.css" rel="stylesheet">

    <title>Login</title>
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
        <div class="col-xs-6 col-md-offset-1">
            <img src="bilder/loginlogo.png" alt="logo" id="loginlogo">

        </div>
        <div class="col-xs-5" id="login">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="form-signin">

                <h3 class="form-signin-heading">Anmelden</h3>

                <input type="text" name="username" class="form-control" placeholder="Username">
                <br>
                <input type="password" name="password" class="form-control" placeholder="Passwort">
                <br>

                <input type="submit" name = "submit" value="Anmelden" class="btn btn-primary" >
                <h5 class="form-signin-heading text-right bottom-right">oder <a href="registration.html">hier Registrieren</a></h5>
            </form>
        </div>
    </div>

</div>

<?php include_once "footer.php"; ?>

<?php

if (isset($_POST["submit"]))
{
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
        ?>

        <script>alert("login fehlgeschlagen")</script>

        <?php

        die();
    }

}



?>


</body>
</html>








