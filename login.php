<?php
session_start();
require("./conf/conf_site.php");
$erreur = '';
if (isset($_POST["user"]) && isset($_POST["mdp"])) {
    $user = $_POST["user"];
    $mdp = $_POST["mdp"];
    $mdp = hash('sha256', $mdp);
    $info_login = $bdd->prepare("SELECT * FROM users WHERE nom = ?");
    $info_login->execute(array($user));
    if ($info_login->rowCount() > 0) {
        $user_info = $info_login->fetch();
        if ($mdp == $user_info["mdp"]) {
            $_SESSION["id"] = $user_info["id"];
            $_SESSION["adresse_mail"] = $user_info["adresse_mail"];
            $_SESSION["nom"] = $user_info["nom"];
            $_SESSION["prenom"] = $user_info["prenom"];
            header("Location: ./public/overview.php");
        }else{
            $erreur = "Le mdp ne correspond pas !";
        }
    } else {
        $erreur = "L'utilisateur n'existe pas";
    }
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
    <div class="main-container">
    <form method="post">
        <h2>Login</h2>
        <input type="text" placeholder="Nom" name="user">
        <input type="password"  placeholder="Mot de passe" name="mdp">
        <button type="submit">Continuer</button>
        <p style="color: red;"><?= $erreur ?></p>
    </form>
    <a href="register.php">Inscription</a>
    </div>
</body>

</html>