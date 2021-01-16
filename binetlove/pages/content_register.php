<?php
if (array_key_exists('nom',$_POST)){
    $nom=$_POST['nom'];
}
$nom="";
if (array_key_exists('prenom',$_POST)){
    $prenom=$_POST['prenom'];
}
$prenom="" ;
if (array_key_exists('casert',$_POST)){
    $casert=$_POST['casert'];
}
$prenom="" ;
$section="Roulade";
$promotion="2019";

$erreur ="";
$ok= false;
$attempt = false;
if(array_key_exists('login',$_POST) && !$_POST['login']=="" && array_key_exists("password",$_POST)){
    $tentative=true;
    $ok=Polytechniciens::insertUser($dbh,$_POST['login'],$_POST['password'], $nom, $prenom, $section, $promotion, $casert);
}
if ($ok) {
    echo "<p> Inscription réussie ! </p>";
}
else if ($attempt){
    echo "<p> Login déjà pris !</p>";
}
?>

<div id="container" class="container-login">
<form class="form-login" role="form" action="index.php?page=register" method="POST">
    <h4>Bienvenue au Binet Love &#128149;</h4>
     <input type="text" class="form-control" name="prenom" value="" placeholder="Prénom" required/>
     <input type="text" class="form-control" name="nom" value="" placeholder="Nom" required/>
     <input  type="text" class="form-control" name="login" value="" placeholder="Login"required/>
     <input  type="password" class="form-control" name="password" value="" placeholder="Mot de Passe"required/>
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
   <select class="form-select" name="promotion" id="promotion" aria-label="Default select example">
   <option selected>Promotion</option>
   <option value="2018">2018</option>
   <option value="2019">2019</option>
   <option value="2020">2020</option>
   </select>  
     <input type="text" class="form-control" name="casert" value="" placeholder="Casert" required/>
     <button  class="btn-rose btn-login heartbeat" type="submit" action="index.php?page=welcome">S'inscire</button>
</form>
</div>