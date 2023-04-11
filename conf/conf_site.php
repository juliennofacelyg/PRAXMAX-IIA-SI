<?php
////////////////////////////////
// Developpeur:Suire          //
// Developpeur:Levilloux      //
////////////////////////////////
$version = "v0.0.1";
///////////////////////////////
// Database-Config Famille   //
///////////////////////////////
// || DataBase ||
$db = "authentification";
$dbuser = "";
$dbpass = "";
$ip = "";
//////////////////////////////
// DataBase PDO Connect     //
//////////////////////////////



try {
    $bdd = new PDO("mysql:host=$ip;dbname=$db;charset=utf8",$dbuser,$dbpass);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed';
}
