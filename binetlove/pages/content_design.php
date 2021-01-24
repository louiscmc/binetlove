<?php 

if(isset($_POST['submit'])){
 
  // Prepared statement
  $query = "INSERT INTO images (nom,login,image) VALUES(?,?,?)";

  $statement = $dbh->prepare($query);

    // File name
    $filename = $_FILES['files']['name'];

    // Location
    $target_file = 'upload/'.$filename;
    // Valid image extension

    $allowedExtensions = array("jpeg", "jpg", "png", "pdf");

    if (in_array(end(explode(".", $filename)), $allowedExtensions)){

       // Upload file
       if(move_uploaded_file($_FILES['files']['tmp_name'],$target_file)){

       // Execute query
	  $statement->execute(array($filename,$login,$target_file));
     echo "Upload réussi ! Merci :)";
   }
 
  }
  
}
?>

<div id="jumbo1" class="container-fluid bg-faded">
   <div class="row">
   <div class="col-md-4 offset-md-4">
      <form method='post' action='' enctype='multipart/form-data'>
      <input type='file' name='files' />
      <br>
      <input type='submit' value='Submit' name='submit' />
      </form>
   </div>
   </div>
</div>
