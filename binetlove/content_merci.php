<?php
            $datetime = date_create()->format('Y-m-d H:i:s');
            $contenu = $_POST["contenu"];
            insererLettre($dbh,'patate','mathilde_andre',$contenu,$datetime); 
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

