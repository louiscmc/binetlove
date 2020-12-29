<?php
session_start();
require_once("database.php");

// On submit
if(isset($_POST['but_submit'])){

   $username = $_POST['txt_uname'];
   $password = $_POST['txt_pwd'];

   if ($username != "" && $password != ""){

     // Fetch records
     $stmt = $dbh->prepare("SELECT count(*) as cntUser,id FROM users WHERE username=:username and password=:password ");
     $stmt->bindValue(':username', $username, PDO::PARAM_STR);
     $stmt->bindValue(':password', $password, PDO::PARAM_STR);
     $stmt->execute(); 
     $record = $stmt->fetch(); 

     $count = $record['cntUser'];
     
     if($count > 0){
        $userid = $record['id'];
        $_SESSION['username']= $username;
        $_SESSION['userid'] = $userid;
        header('Location: index.php');
        exit;
    }else{
        echo "Invalid username and password";
    }

  }

}
?>

<!doctype html>
<html>
  <head>
     <title>Se connecter | Binet Love</title>
        <link rel="icon" href="https://media.discordapp.net/attachments/671453585422155788/781895454858149888/Logo_Love.png">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!-- jQuery UI library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <!-- Mon CSS Perso -->
        <link href="css/perso.css" rel="stylesheet">
        <script src="js/ac_js.js"></script>

  </head>
  <body class="color-change-2x">
     <div id="container" class="container-login">
       
       <form class="form-login" method="post" action="">
         <div id="div_login">
             <h1>Connecte toi !</h1>
            <div>
              <input type="text" class="textbox" name="txt_uname" value="" placeholder="Login" />
            </div>
            <div>
              <input  type="password" class="textbox" name="txt_pwd" value="" placeholder="Mot de Passe"/>
            </div>
            <div>
              <input  class="btn-rose btn-login heartbeat" type="submit" value="Se connecter" name="but_submit" id="but_submit" />
            </div>
         </div>
        </form>
    </div>
   </body>
</html>