<?php
/**
 * Created by PhpStorm.
 * User: Richi
 * Date: 22.06.2015
 * Time: 11:11
 */

// Cardtype = cardType;
// Cardname = cardName
// Rarity = rarity
// Legendary = legenday
// edition, color, manaColor, combine, duplicate
// To get all Cardeffects: var $number as counter, use a for loop to iterate throw the array effect and effectCost

$cardType = $_POST["cardType"];
$cardName = $_POST["cardName"];
$rarity = $_POST["rarity"];
$edition = $_POST["edition"];
$color = $_POST["color"];
$manaColor = $_POST["manaColor"];
$combine = $_POST["combine"];
$duplicates = $_POST["duplicate"];

if ($cardType == "Creature")
{
    $attack = $_POST["attack"];
    $defense = $_POST["defens"];
    $creatureType = $_POST["creatureType"];
    $staticEffects = "";
    foreach ($_POST["selectStatic"] as $value)
    {
        $staticEffects .= "$value,";
    }
    rtrim($staticEffects, ",");
    echo $staticEffects;
}


//MySQL abfrage ob combine in der Datenbank ist, wenn ja mit dieser Karte verbinden
//Für jeden Karteneffekt eine neue Spalte in der Datenbank Fähigkeiten anlegen und mit Karte verbinden.
//static Effects ist ein einzelner String der alle statischen Eigenschaften speichert.
?>