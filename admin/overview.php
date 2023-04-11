<?php
session_start();
require("../conf/conf_site.php");
require('../modules/verif_login.php');

if (isset($_POST['editor'])) {

  $content = $_POST['editor'];

  $article = $bdd->prepare("INSERT INTO articles(contenue) VALUES (?)");
  $article->execute([$content]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin Page</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
</head>
<body>
    <h1>Ajouter un article</h1>

    <form method="POST" action="">
      <textarea name="editor" id="editor">
        
      </textarea>
      <button type="submit">Nouveau Poste</button>
    </form>

    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
</body>
</html>
