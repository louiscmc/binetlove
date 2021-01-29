<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $target_dir = "upload/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
      $uploadOk = 1;
    } else {
      echo "Ce fichier n'est pas une image.";
      $uploadOk = 0;
    }
  }

  // Check if file already exists
  if (file_exists($target_file)) {
    echo "Ce fichier existe déjà ! (change le nom)";
    $uploadOk = 0;
  }

  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 3000000) {
    echo "Taille max 3Mo.";
    $uploadOk = 0;
  }

  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
    echo "Formats autorisés : jpg, jpeg ou png.";
    $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Votre design n'a pas pu être uploadé... :(";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      echo "<div class='alert alert-success' role='alert'>" ;
      echo 'Le fichier ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " a bien été uploadé !.';
      echo "</div>";
    } else {
      echo "<div class='alert alert-danger' role='alert'>";
      echo "Votre design n'a pas pu être uploadé... :(";
      echo "</div>";
    }
  }
}
?>

<div id="jumbo1" class="jumbotron jumbotron-fluid bg-faded">
<div class="container">
<h1 class="display-4 text-focus-in">Envoie ton plus <span class='red'>beau</span> design !</h1>
</div>
</div>
<div class="container">
 <form action="
                <?php 
                    $url = $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING'];
                    echo htmlspecialchars($url, ENT_QUOTES, 'utf-8');
                ?>
            " method="post" enctype="multipart/form-data">
  Choisir un fichier à uploader:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>
    <div id="err"></div>
 <hr>
</div>

