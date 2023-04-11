<?php
session_start();
require("./conf/conf_site.php");
$erreur = '';
if (!empty($_POST["name"]) && !empty($_POST["mdp"]) && !empty($_POST["f-name"]) && !empty($_POST["mail"])) {
    $name = $_POST["name"];
    $fname = $_POST["f-name"];
    $mdp = $_POST["mdp"];
    $mail = $_POST["mail"];
    $mdp = hash('sha256', $_POST["mdp"]);

    $info_users = $bdd->prepare("SELECT * FROM users WHERE nom = ?");
    $info_users->execute(array($name));
    if ($info_users->rowCount() == 0) {
        $register = $bdd->prepare("INSERT INTO users(adresse_mail,nom,prenom,mdp) VALUE(?,?,?,?)");
        $register->execute(array($mail, $name, $fname, $mdp));
    } else {
        $erreur = 'L\'utilisateur existe déja !';
    }
} else {
    $erreur = 'merci de remplire tous les champs';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./asset/css/main.css">
</head>

<body>
    <form method="post">
        <div class="main-container">
            <h2>Inscription</h2>
            <input type="text" placeholder="Nom" name="name">
            <input type="text" placeholder="Prénom" name="f-name">
            <input type="mail" placeholder="mail" name="mail">
            <input type="password" placeholder="Mot de passe" name="mdp">
            <button type="submit">Send</button>
            <p style="color: red;"><?= $erreur ?></p>
            <a href="login.php">Login</a>
        </div>
    </form>
</body>

</html>