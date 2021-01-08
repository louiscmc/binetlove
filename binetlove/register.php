<!doctype html>
<html>
<?php
require_once("database.php");
                $nom = $prenom= "";
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    
                    // on regarde si l'utilisateur a bien rempli tous les champs
                   
                    if (empty($_POST["name"])) {
                            $nameErr = "Il faut remplir le prénom !";
                        } 
                        else {
                            $prenom = test_input($_POST["name"]);
                    }
                    if (empty($_POST["surname"])) {
                            $surnameErr = "Il faut remplir le nom !";
                        } 
                        else {
                            $nom = test_input($_POST["surname"]);
                    }
                    if (empty($_POST["section"])) {
                            $sectionErr = "Il faut choisir la section !";
                        } 
                        else {
                            $section = $_POST["section"];
                    }
                    if (empty($_POST["casert"])) {
                            $casertErr = "Il faut remplir le casert !";
                        } 
                        else {
                            $casert = test_input($_POST["casert"]);
                    }
                    if (empty($_POST["promo"])) {
                            $promoErr = "Il faut choisir la promo !";
                        }
                        else {
                            $promotion = $_POST["promo"];
                    }
                    if (empty($_POST["pwd"])) {
                            $passwordErr = "Il faut remplir le mot de passe !";
                        } 
                        else {
                            $pwd = test_input($_POST["pwd"]);
                    }
                    if (empty($_POST["login"])) {
                            $passwordErr = "Il faut remplir le login !";
                        } 
                        else {
                            $login = test_input($_POST["login"]);
                    }
                    if ($nom !="" && $prenom != "" ){
                                insererUtilisateur($dbh, $login, $pwd ,$nom,$prenom,$section,$promotion,$casert);
                    }               
            ?>


  <body class="color-change-2x">
     <div id="container" class="container-login">
       <form class='login-form' action="
                <?php 
                    $url = $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING'];
                    echo htmlspecialchars($url, ENT_QUOTES, 'utf-8');
                ?>
            " method="post">
         <div id="div_login">
             <h1>Bienvenue au binet love !</h1>
            <div>
              <input type="text" class="textbox" name="name" value="" placeholder="Prénom" />
            </div>
            <div>
              <input type="text" class="textbox" name="surname" value="" placeholder="Nom" />
            </div>
             <div>
              <input  type="login" class="textbox" name="login" value="" placeholder="Login"/>
            </div>
            <div>
              <input  type="password" class="textbox" name="pwd" value="" placeholder="Mot de Passe"/>
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
              <div <div class='col-md-6'>
            <select class="form-select" name="promo" id="promo" aria-label="Default select example">
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
    </div>
   </body>
</html>