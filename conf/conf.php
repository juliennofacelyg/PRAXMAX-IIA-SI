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
$dbuser = "root";
$dbpass = "";
//////////////////////////////
// DataBase PDO Connect     //
//////////////////////////////
$bdd = new PDO("mysql:host=localhost;dbname=$db;charset=utf8",$dbuser,$dbpass);

