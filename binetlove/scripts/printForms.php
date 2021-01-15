<?php
function printLoginForm($askedPage){
echo <<<CHAINE_DE_FIN
<form class="form-inline my-2 my-lg-0" action="index.php?page=$askedPage&todo=login" method="POST">
     <input type="text" class="form-control mr-sm-2" name="login" value="" placeholder="Login" />
     <input  type="password" class="form-control mr-sm-2" name="password" value="" placeholder="Mot de Passe"/>
     <input  class="btn btn-rose my-A my-sm-0" type="submit" value="Se connecter" name="but_submit" id="but_submit" />
     <a href='index.php?page=register' class="my-A my-sm-0"><input class="btn btn-rose"" value="S'inscrire" name="but_register" id="but_register" /></a>
</form>
CHAINE_DE_FIN;
}

function printLogoutForm(){
echo<<<CHAINE_DE_FIN
<form class="form-inline my-2 my-lg-0" method="post" action="index.php?page=welcome&todo=logout">
<input type="submit" value="Se déconnecter" class="btn btn-rose btn-login my-2 my-sm-0" name="but_logout" id="but_logout"/>
</form>
CHAINE_DE_FIN;
}
