<div id="jumbo1" class="jumbotron jumbotron-fluid bg-faded">
              <div class="container">
                  <h1 class="display-4 text-focus-in">Bienvenue au <span class='red'>Binet Love</span> !</h1>
              </div>
</div>
<?php
// reCaptcha :
require_once 'scripts/autoload.php';
$nom = $prenom = $promotion = $casert = $section = $password = $login = $bienrecu ="";
$Err= $loginErr="";
$checkLogin=false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // on regarde si l'utilisateur a bien rempli tous les champs
    if (empty($_POST["prenom"])) {
        $Err = "Il manque des champs à remplir !"; 
    } 
    else {
        $prenom = test_input($_POST["prenom"]);
    }
    if (empty($_POST["nom"])) {
        $Err = "Il manque des champs à remplir !"; 
    } 
    else {
        $nom = test_input($_POST["nom"]);
    }
    if (empty($_POST["login"])) {
        $Err = "Il manque des champs à remplir !"; 
    } 
    else {
        $login = test_input($_POST["login"]);
        $checkLogin = checkLogin($dbh,$login);
    }
    if (empty($_POST["password"])) {
        $Err = "Il manque des champs à remplir !"; 
    } 
    else {
        $password = test_input($_POST["password"]);
    } 
    if (empty($_POST["casert"])) {
        $Err = "Il manque des champs à remplir !"; 
    } 
    else {
        $casert = test_input($_POST["casert"]);
    }
    if (empty($_POST["promotion"]) || $_POST["section"]=="0") {
        $Err = "Il manque des champs à remplir !"; 
    } 
    else {
        $section = $_POST["section"];
    }
    if (empty($_POST["promotion"])||$_POST["promotion"]=="0") {
        $Err = "Il manque des champs à remplir !"; 
    } 
    else {
        $promotion = $_POST["promotion"];
    }
    // vérification du captcha :
    $secret = '6LfkL30aAAAAAOE388ZS3yc2dnmvzUY06GQ8PjcT';
    $recaptcha = new \ReCaptcha\ReCaptcha($secret);
    if(isset($_POST['g-recaptcha-response'])){
        $resp = $recaptcha->setExpectedHostname('binetlove.localhost')
                        ->verify($_POST['g-recaptcha-response']);
        if ($resp->isSuccess()) {
            // le captcha est validé !
        } else {
            $errors = $resp->getErrorCodes();
        }
    }
    else {
        $Err = "N'oublie pas le captcha !";
    }

    if ($Err == ""){
            if ($checkLogin==true){
                insererUtilisateur($dbh,$login,$password, $nom, $prenom, $section, $promotion, $casert);
                $bienrecu = "Tu es bien inscrit sur le site !  <br> N'hésite pas à aller écrire une lettre &#128151;";
                $prenom = $nom = $promotion = $casert = $section = $password = $login = "";
                $Err = "";
            } else {
                $loginErr = "Ce login est déjà pris :/ ...";
            }
    }

}

?>
<div id="container" class="container-login">
        <form id="regi-form" action="
            <?php 
                $url = $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING'];
                echo htmlspecialchars($url, ENT_QUOTES, 'utf-8');
            ?>
        " method="post"> 
            <div class="container-fluid">
                <div class="row">
                    <div class="col"></div>
                        <div class="col-6">
                            <?php
                            if ($Err!=''){echo"
                            <div class='alert alert-danger' role='alert'>
                                $Err
                            </div>
                            ";}
                            if ($bienrecu!=''){echo"
                            <div class='alert alert-success' role='alert'>
                                $bienrecu
                                <script> location = index.php?page=welcome; </script>
                            </div>
                            ";}
                            if ($loginErr!=""){echo"
                            <div class='alert alert-danger' role='alert'>
                                $loginErr
                            </div>
                            ";}
                            ?>
                        </div>
                    <div class="col"></div>  
                </div>
            </div> 
        <input type="text" class="form-control" name="prenom" value="" placeholder="Prénom" />
        <input type="text" class="form-control" name="nom" value="" placeholder="Nom" />
        <input  type="text" class="form-control" name="login" value="" placeholder="Login"/>
        <input  type="password" class="form-control" name="password" value="" placeholder="Mot de Passe"/>
        <select class="form-select" name='section' id="section" aria-label="Default select example">
            <option selected="selected" value="0">Section</option>
            <option value="Aviron">Aviron</option>
            <option value="Bad">Bad</option>
            <option value="Basket">Basket</option>
            <option value="Boxe">Boxe</option>
            <option value="Crossfit">Crossfit</option>
            <option value="Equitation">Équitation</option>
            <option value="Escalade">Escalade</option>
            <option value="Escrime">Escrime</option>
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
        <select class="form-select" name="promotion" id="promotion" aria-label="Default select example">
            <option selected="selected" value="0">Promotion</option>
            <option value="2018">2018</option>
            <option value="2019">2019</option>
            <option value="2020">2020</option>
        </select>
        <input type="text" class="form-control" name="casert" value="" placeholder="Casert"/>
        <div class="g-recaptcha" data-sitekey="6LfkL30aAAAAAGGgfhO7n-jUOV0Jyl4FkSAZVGg6"></div>
        <button  class="btn-rose btn-login heartbeat" type="submit" value="Submit">S'inscire</button>
        </form>
    </div>
</div>