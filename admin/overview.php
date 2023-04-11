<?php
session_start();
require("../conf/conf_site.php");
require('../modules/verif_login.php');
if ($_SESSION["permission"] != 1) {

  header("location:../login.php");
}
$articleslist = $bdd->query('SELECT * FROM articles');
$articles = $articleslist->fetchAll(PDO::FETCH_ASSOC);
if (!empty($_POST['editor']) && !empty($_FILES['image'])) {
  $content = $_POST['editor'];
  $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
  $file_extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
  if (in_array($file_extension, $allowed_types)) {
    $upload_dir = '../public/img/';
    $filename = uniqid() . '.' . $file_extension;
    $upload_path = $upload_dir . $filename;
    if (move_uploaded_file($_FILES['image']['tmp_name'], $upload_path)) {
      $article = $bdd->prepare("INSERT INTO articles(contenue,img) VALUES (?, ?)");
      $article->execute(array($content, $filename));
      echo 'Le fichier a été uploadé avec succès.';
    } else {
      echo 'Une erreur est survenue lors de l\'upload du fichier.';
    }
  } else {
    echo 'Le fichier doit être une image (jpg, jpeg, png ou gif).';
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Admin Page</title>
  <link rel="stylesheet" href="../asset/css/main.css">
  <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
</head>

<body>
  <h2 style="text-align: center;">Ajouter un article</h2>
  <a href="../logout.php">Se déconnecter</a>
  <div class="container-overview">
    <form method="POST" enctype="multipart/form-data">
      <textarea name="editor" id="editor"></textarea>
      <input type="file" name="image" placeholder="Image">
      <button type="submit">Nouveau Poste</button>
    </form>
  </div>


  <?php foreach ($articles as $article) : ?>
    <div class="container-blog">
      <?php echo $article['contenue']; ?>
      <img style="max-width: 500px;" src="../public/img/<?= $article['img'] ?>" alt="<?= $article['contenue'] ?>">
      <a href="s">Edit</a>
    </div>
  <?php endforeach; ?>
  <script>
    ClassicEditor
      .create(document.querySelector('#editor'))
      .catch(error => {
        console.error(error);
      });
  </script>
</body>

</html>