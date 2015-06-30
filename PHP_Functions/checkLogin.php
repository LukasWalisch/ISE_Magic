<?php
/**
 * Created by PhpStorm.
 * User: Lukas Walisch
 * Date: 30.06.2015
 * Time: 22:42
 */

session_start();
if ($_SESSION["username"]=="")
{
    header("Location: index.html");
}

?>