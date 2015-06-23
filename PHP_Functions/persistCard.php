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

    //Neue Creatur in Datenbank speichern
}else if ($cardType == "Spell")
{
    $spellType = $_POST["spellType"];

    //neuen Zauber in Datenbank speichern
}else if ($cardType == "Planeswalker")
{
    $planeLife = $_POST["life"];
    //neuen Planeswalker in Datenbank speichern
}else
{
    //neues Land speichern.
}

for ($count = 0; $count < $_POST["number"]; $count++) //Hier werden die Spalten in der Tabelle Fähigkeiten gespeichert. Statt echo
{
    echo $_POST["effect"][$count];
    echo " \n";
    echo $_POST["effectCost"][$count];
    echo "\n";

}


//MySQL abfrage ob combine in der Datenbank ist, wenn ja mit dieser Karte verbinden
//Für jeden Karteneffekt eine neue Spalte in der Datenbank Fähigkeiten anlegen und mit Karte verbinden.
//static Effects ist ein einzelner String der alle statischen Eigenschaften speichert.
?>