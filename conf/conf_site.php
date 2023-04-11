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
$bdd = new PDO("mysql:host=$ip;dbname=$db;charset=utf8",$dbuser,$dbpass);

