<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="SS14 IS Engineering (PR), Universitaet Wien">
    <meta name="author" content="Team 13">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="main.css" rel="stylesheet">

    <title>Kartensuche</title>
</head>
<body>

<?php include_once "header.php"; ?>

<?php
$creature = $_POST["creatureType"];
$spell = $_POST["spellType"];
$land = $_POST["landType"];
$plane = $_POST["planeType"];
$nameString = $_POST["nameString"];

include "searchCard.php"; //Returns cardFoundQuery.
if(! $cardFoundQuery )
{
    ?>
    <h2>Keine Ergebnise</h2>
    <?php
    die("Keine Ergebnise");
}
while ($zeile = mysqli_fetch_array($cardFoundQuery, MYSQL_ASSOC))
{
    if ($nameString == "" || strpos($zeile["name"],$nameString) !== false)
    {
        $typeString = "";
        if ($zeile["legendary"] == 1)
        {
            $typeString .= "Legendary";
        }
        $typeString .= $zeile["name"];
        ?>
        <h2><?php echo $zeile["name"] ?></h2>
        <br/>
        <?php
    }
}

?>


<?php include_once "footer.php"; ?>
</body>
</html>
