<div id="jumbo1" class="jumbotron jumbotron-fluid bg-faded">
    <div class="container">
        <h1 class="display-4 text-focus-in"><span class='red'>Modifie</span> ou <span class='grey'>supprime</span> tes <span class='red'>lettres</span> !</h1>
    </div>
</div>
<div class="container">
    <br>
    <div class='row justify-content-md-center'>
    <a class="btn btn-light" href="index.php?page=letter" role="button">Revenir au formulaire</a>
    </div>
    <br>
    <?php
    $login = $_SESSION['login'];
    $result = $dbh->prepare("SELECT id, destinataire, contenu, time, chupachups, design "
            . "FROM lettre "
            . "WHERE login=? and supprime=0 "
            . "order by time desc");
    $result->execute(array($login));
        if ($result->rowCount() > 0){
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    //récupération des données 
                    $id=$row['id'];
                    $destinataire = $row['destinataire'];
                    $contenu = $row['contenu'];
                    $temps=$row['time'];
                    $time= strftime('%T le %D', strtotime($temps));
                    $design=$row['design'];

                    //bails de chupas
                    $chupa= $row['chupachups'];
                    $dessin_chupa="";
                    $css_chupa="rose";
                    $btn_chupa="Ajouter une sucette ! 🍭";
                    if ($chupa==1){
                        $dessin_chupa="🍭";
                        $btn_chupa="Retirer la sucette :(";
                        $css_chupa="dark";
                    }

                    //destinataire
                    $desti_data= getDestinataireReverse($dbh, $destinataire);
                    $prenom = $desti_data['prenom'];
                    $nom=$desti_data['nom'];
                    $section = $desti_data['section'];
                    $promotion = $desti_data['promotion'];
                    $stringid=strval($id);
                    
                    // si bouton chupa cliqué
                    if(array_key_exists('chupa'.$stringid, $_POST)) { 
                        modifierChupa($dbh, $id, $chupa);
                        echo"<script> location = location; </script>";
                    } 

                    // si bouton supprimer cliqué
                    if(array_key_exists('supprimer'.$stringid, $_POST)) { 
                        supprimerLettre($dbh, $id);
                        echo"<script> location = location; </script>";
                    } 

                    //si bouton modifier cliqué
                    if(array_key_exists('modifier'.$stringid, $_POST)){
                        
                        echo <<<carte_modif
                            <div id='myForm'>
                                <form method='post'>
                                    <label for='contenumod'>Écris ton message !</label>
                                    <textarea class='form-control' name='contenumod$id' id='contenumod$id' placeholder='Votre lettre !' rows='12'>$contenu</textarea>
                                    <br>
                                    <div class='row justify-content-md-center'>
                                        <button type='submit' name='modfinal$id' class='btn btn-success' style='margin:5px;'>Modifier</button>
                                        <button type='submit' name='fermer$id' class='btn cancel' onclick='closeForm()' style='margin:5px;'>Fermer</button>
                                    </div>
                                </form>
                            </div>
                            <br>
                            <script src='ckeditor/ckeditor.js'></script>
                            <script>
                                CKEDITOR.replace('contenumod$id');
                            </script>
carte_modif;
                        
                    }
                    if(!array_key_exists('modifier'.$stringid, $_POST) || array_key_exists('modfinal'.$stringid, $_POST) || array_key_exists('fermer'.$stringid, $_POST)){
                    $contenu=html_entity_decode($contenu);
                    //var_dump(htmlentities($contenu));
                    echo <<<carte
                        <div class='row'>
                            <div class='col-sm'>
                                <div class='card' >
                                    <div class='card-header' style="background-image: url('$design'); background-position: center;">
                                        <span class="card-txt">
                                            $prenom $nom ($section $promotion)
                                        </span>
                                        <span class='float-right'>$dessin_chupa</span>
                                    </div>
                                    <div class='card-body'>
                                        <div>
                                            $contenu
                                        </div>
                                        <br>
                                        <form method='post'> 
                                                <input type='submit' name='modifier$id' class='btn btn-light' value='Modifier' /> 
                                                <input type='submit' name='supprimer$id' class='btn btn-danger' value='Supprimer' /> 
                                                <input type='submit' name='chupa$id' class='btn btn-$css_chupa' value='$btn_chupa' /> 
                                        </form> 
                                    </div>
                                    <div class='card-footer text-muted' style="background-image: url('$design');background-position: bottom;">
                                    <span class="card-txt">
                                        Envoyé à $time</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
carte; }
                    if(array_key_exists('modfinal'.$stringid, $_POST)){
                        $contenumod=$_POST['contenumod'.$id];
                        $contenumodok=test_input($contenumod);
                        modifierLettre($dbh, $id, $contenumodok);
                        echo"<script> location = location; </script>";
                    }
                }
            } 
        else {
            echo "
                        <div class='row'>
                            <span>Vous n'avez pas encore envoyé de lettres :( </span>
                        </div>
            ";
        }
    ?>
    <br>
    <div class='row justify-content-md-center'>
    <a class="btn btn-light" href="index.php?page=letter" role="button">Revenir au formulaire</a>
    </div>
    <br>
</div>

