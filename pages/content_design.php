<?php
$upload=3;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $target_dir = "upload/";
  $nom = basename($_FILES["fileToUpload"]["name"]);
  $target_file = $target_dir . $nom;
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $datetime = date_create()->format('Y-m-d H:i:s');

  // On regarde si le fichier envoyé est une image (on bloque les "fausses images")
  if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
      $uploadOk = 1;
    } else {
      echo "Ce fichier n'est pas une image.";
      $uploadOk = 0;
    }
  }

  // On regarde si le fichier est déjà existant
  if (file_exists($target_file)) {
    echo "Ce fichier existe déjà ! (change le nom)";
    $uploadOk = 0;
  }

  // Taille de l'image 
  if ($_FILES["fileToUpload"]["size"] > 3000000) {
    echo "Taille max 3Mo.";
    $uploadOk = 0;
  }

  // On autorise uniquement certains formats (sécurité)
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
    echo "Formats autorisés : jpg, jpeg ou png.";
    $uploadOk = 0;
  }

  //On regarde si on a une erreur d'upload avec $uploadOk
  if ($uploadOk == 0) {
    echo "Votre design n'a pas pu être uploadé... :(";
  // Si tout est ok, on essaie de mettre le fichier dans la base de données :
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      $patate =htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]));
      $upload=1;
      insererImage($dbh, $_SESSION['login'], $target_file, $datetime, 0); 
    }
    else{
      $upload=0;
    } 
  }
}
?>

<div id="jumbo1" class="jumbotron jumbotron-fluid bg-faded">
  <div class="container">
    <h1 class="display-4 text-focus-in">Envoie ton plus <span class='red'>beau</span> design !</h1>
  </div>
</div>
<div class="container-fluid">
    <?php
    if ($upload==1){echo"
    <div class='alert alert-success' role='alert'>
    Le fichier $patate a bien été uploadé !.
    </div>
    ";}
    if($upload==0){echo"
    <div class='alert alert-danger' role='alert'>
    Votre design n'a pas pu être uploadé... :(
    </div>
    ";}
    ?>
  </div>
  <div class="container-login">
    <form action="
          <?php 
              $url = $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING'];
              echo htmlspecialchars($url, ENT_QUOTES, 'utf-8');
          ?>
      " method="post" enctype="multipart/form-data">
        <input type="file" name="fileToUpload" id="fileToUpload">
        <button class="btn btn-rose" type="submit" value="Upload Image" name="submit">Envoyer</button>
        <?php if (isAdmin($dbh, $_SESSION['login'])){
                              echo<<<fulldesign
                              <a class="btn btn-light" href="index.php?page=design_admin" role="button">Voir tous les designs</a>
      fulldesign;
                          } ?>
    </form>
  </div>

