<?php
if (array_key_exists($nom,$_POST)){
    $nom=$_POST['nom'];
}
$nom="";
if (array_key_exists($prenom,$_POST)){
    $prenom=$_POST['prenom'];
}
$prenom="" ;

$erreur ="";
$ok= false;
$tentative = false;
if(array_key_exists('login',$_POST) && !$_POST['login']=="" && array_key_exists("password",$_POST)){
    $tentative=true;
    $ok=Utilisateur::insererUtilisateur($dbh,$_POST['login'],$_POST['password'], $nom, $prenom)
}


<div id="container" class="container-login">
<form class="form-login" action="index.php?page=$askedPage&todo=register" method="POST">
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
</div>