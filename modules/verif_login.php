<?php
if (isset($_SESSION['steamid'])) {
    $requser = $bdd->prepare("SELECT * FROM users WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    if ($requser->rowCount() > 0) {
        $userinfo = $requser->fetch();
        if ($userinfo['id'] == $_SESSION['id']) {
            return;
        } else {
            header("Location: ../login.php");
        }
    } else {
        header("Location: ../login.php");
    }
} else {
    header("Location: ../login.php");
}
