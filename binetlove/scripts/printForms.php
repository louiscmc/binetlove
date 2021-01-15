<?php
function printLoginForm($askedPage){
echo <<<CHAINE_DE_FIN
<form class="form-inline my-2 my-lg-0" action="index.php?page=$askedPage&todo=login" method="POST">
     <input type="text" class="form-control mr-sm-2" name="login" value="" placeholder="Login" />
     <input  type="password" class="form-control mr-sm-2" name="password" value="" placeholder="Mot de Passe"/>
     <input  class="btn btn-rose my-A my-sm-0" type="submit" value="Se connecter" name="but_submit" id="but_submit" />
     <a href='index.php?page=register'><input class="btn btn-rose my-A my-sm-0"" value="S'inscrire" name="but_register" id="but_register" /></a>
</form>
CHAINE_DE_FIN;
}

function printLogoutForm(){
echo<<<CHAINE_DE_FIN
<a href='index.php?page=welcome&todo=login'><input type="submit" value="Se déconnecter" class="btn btn-rose btn-login my-2 my-sm-0" name="but_logout" id="but_logout"/></a>
CHAINE_DE_FIN;
}

function printRegisterForm($askedPage){
    echo <<<CHAINE_DE_FIN
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
CHAINE_DE_FIN;
}