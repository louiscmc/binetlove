<?php
session_start();
require_once("database.php");

// On submit
if(isset($_POST['but_submit'])){

   $login = $_POST['txt_login'];
   $password = hash('sha512', $_POST['txt_pwd']);
   if ($login != "" && $password != ""){

     // Fetch records
     $stmt = $dbh->prepare("SELECT count(*) as cntUser,login FROM polytechniciens WHERE login=? and password=?");
   $stmt->execute(array($login, $password ));
     $record = $stmt->fetch(); 

     $count = $record['cntUser'];
     
     if($count > 0){
        $_SESSION['login'] = $login;
        $_SESSION['timeout']=time();
        header('Location: index.php');
        exit;
    }else{
        echo "Invalid login and password";
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
              <input type="text" class="textbox" name="txt_login" value="" placeholder="Login" />
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