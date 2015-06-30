<?php
/**
 * Created by PhpStorm.
 * User: Lukas Walisch
 * Date: 01.07.2015
 * Time: 00:07
 */
session_start();
session_destroy();
header("Location: index.html");
?>