<!DOCTYPE html>
<html>
<head>
     <title>S'inscrire | Binet Love</title>
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
<?php
    require_once("database.php");
if(isset($_POST['but_submit'])){
        $login = $_POST['login'];
        $password = $_POST['password'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $section = $_POST['section'];
        $promotion = $_POST['promotion'];
        $casert = $_POST['casert'];

      if($login!="" && $password!="" && $nom!="" && $prenom!="" &&$section!=""&&$promotion!=""&&$casert!=""){
        echo "il se passe un truc";
        $result = insererUtilisateur($dbh, $login, $password,$nom,$prenom,$section,$promotion,$casert);
        var_dump($result);
        echo "<div class='form'>
                  <h3>Tu es enregistré !</h3><br/>
                  <a href='login.php'>Se connecter</a>
                  </div>";
      }
      else {
            echo "<div class='form'>
                  <h3>Il manque des champs à remplir !</h3><br/>
                  <a href='register.php'>Réessayer</a>
                  </div>";
        }
    }
?>
  <div id="container" class="container-login">
    <form class="login-form" action="" method="post">
         <div id="div_login">
             <h1>Bienvenue au binet love !</h1>
            <div>
              <input type="text" class="textbox" name="prenom" value="" placeholder="Prénom" />
            </div>
            <div>
              <input type="text" class="textbox" name="nom" value="" placeholder="Nom" />
            </div>
             <div>
              <input  type="text" class="textbox" name="login" value="" placeholder="Login"/>
            </div>
            <div>
              <input  type="password" class="textbox" name="password" value="" placeholder="Mot de Passe"/>
            </div>
            <div class="row">
             <div class='col-md-6'>
            <select class="form-select" name='section' id="section" aria-label="Default select example">
              <option selected>Section</option>
              <option value="Aviron">Aviron</option>
              <option value="Bad">Bad</option>
              <option value="Basket">Basket</option>
              <option value="Boxe">Boxe</option>
              <option value="Crossfit">Crossfit</option>
              <option value="Équitation">Équitation</option>
              <option value="Escalade">Escalade</option>
              <option value="Foot">Foot</option>
              <option value="Hand">Hand</option>
              <option value="Judo">Judo</option>
              <option value="Natation">Natation</option>
              <option value="Raid">Raid</option>
              <option value="Roulade">Roulade</option>
              <option value="Rugby">Rugby</option>
              <option value="Tennis">Tennis</option>
              <option value="Ultimate">Ultimate</option>
              <option value="Volley">Volley</option>
            </select>  
             </div>
              <div class='col-md-6'>
            <select class="form-select" name="promotion" id="promotion" aria-label="Default select example">
            <option selected>Promotion</option>
            <option value="2018">2018</option>
            <option value="2019">2019</option>
            <option value="2020">2020</option>
            </select>  
             </div>
            </div>
             <div>
              <input type="text" class="textbox" name="casert" value="" placeholder="Casert" />
            </div>
            <div>
              <input  class="btn-rose btn-login heartbeat" type="submit" value="S'inscire" name="but_submit" id="but_submit" />
            </div>
         </div>
    </form>
</body>
</html>