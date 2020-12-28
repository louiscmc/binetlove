<?php
            $datetime = date_create()->format('Y-m-d H:i:s');
            $contenu = $_POST["contenu"];
            $prenom = '';
            $section=$_POST["section"];
            /*$destinataire= getDestinataire($dbh, $nom, $prenom, $section, $promotion);*/
            insererLettre($dbh,'patate',$prenom.'.'.$nom,"$contenu","$datetime"); 
            $dbh = null;
        ?>
<div id="jumbo2" class="jumbotron jumbotron-fluid bg-faded">
                <div class="container">
                    <h1 class="display-4">Merci pour votre lettre !</h1>
                    <p class="lead">N'oubliez pas que vous pouvez aussi écrire des lettres sur papier !</p>
                    <hr class="my-4">
                    <p>Envoyez tout votre amour ! &#128149;</p>
                    <a class="btn btn-rose btn-lg" href="index.php?page=welcome" role="button">Retour à l'accueil</a>
                </div>
</div>

