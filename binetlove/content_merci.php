<?php
//        gestion du stockage de la lettre dans la base de données
            $datetime = date_create()->format('Y-m-d H:i:s');
            $contenu = trim($_POST['contenu']);
            $prenom = trim($_POST['prenom']);
            $nom = trim($_POST['nom']);
            $promotion = trim($_POST['promotion']);
            $section=trim($_POST["section"]);
            $destinataire= getDestinataire($dbh, $nom, $prenom, $section, $promotion);
            insererLettre($dbh,"patate", $destinataire, $contenu,"$datetime"); 
            $dbh = null;
        ?>

<!--affichage de la page de remerciements-->
<div id="jumbo2" class="jumbotron jumbotron-fluid bg-faded">
                <div class="container">
                    <h1 class="display-4">Merci pour votre lettre !</h1>
                    <p class="lead">N'oubliez pas que vous pouvez aussi écrire des lettres sur papier !</p>
                    <hr class="my-4">
                    <p>Envoyez tout votre amour ! &#128149;</p>
                    <a class="btn btn-rose btn-lg" href="index.php?page=welcome" role="button">Retour à l'accueil</a>
                </div>
</div>

