<div class="container">
    <br>
    <div class='row justify-content-md-center'>
    <a class="btn btn-light" href="index.php?page=letter" role="button">Revenir au formulaire</a>
    </div>
    <br>
    <?php
    $login = $_SESSION['login'];
    $result = $dbh->prepare("SELECT id, destinataire, contenu, time, chupachups "
            . "FROM lettre "
            . "WHERE login=? and supprime=0 "
            . "ORDER BY id DESC");
    $result->execute(array($login));
        if ($result->rowCount() > 0){
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    $id=$row['id'];
                    $destinataire = $row['destinataire'];
                    $contenu = $row['contenu'];
                    $temps=$row['time'];
                    $time= strftime('%T le %D', strtotime($temps));
                    $chupa= $row['chupachups'];
                    $dessin_chupa="";
                    if ($chupa==1){
                        $dessin_chupa="🍭";
                    }
                    $desti_data= getDestinataireReverse($dbh, $destinataire);
                    $prenom = $desti_data['prenom'];
                    $nom=$desti_data['nom'];
                    $section = $desti_data['section'];
                    $promotion = $desti_data['promotion'];
                    $stringid=strval($id);
                    if(array_key_exists('supprimer'.$stringid, $_POST)) { 
                        supprimerLettre($dbh, $id);
                        header("Refresh:0");
                    } 
                    if(array_key_exists('modifier'.$stringid, $_POST)){
                        
                        echo <<<carte_modif
                            <div id='myForm'>
                                <form method='post'>
                                    <label for='contenumod'>Écris ton message !</label>
                                    <textarea class='form-control' name='contenumod$id' id='contenumod$id' placeholder='Votre lettre !' rows='12'>$contenu</textarea>
                                    <br>
                                    <div class='row justify-content-md-center'>
                                        <button type='submit' class='btn btn-success' style='margin:5px;'>Modifier</button>
                                        <button type='button' class='btn cancel' onclick='closeForm()' style='margin:5px;'>Fermer</button>
                                    </div>
                                </form>
                            </div>
                            <br>
                            <script src='ckeditor/ckeditor.js'></script>;
                            <script>
                                CKEDITOR.replace('contenumod$id');
                            </script>
carte_modif;
                        
                    }
                    
                    if(array_key_exists('contenumod'.$id, $_POST)){
                        $contenumod=$_POST['contenumod'.$id];
                        $contenumodok=test_input($contenumod);
                        modifierLettre($dbh, $id, $contenumodok);
                        header("Refresh:0");
                    }
                    $contenu=html_entity_decode($contenu);
                    //var_dump(htmlentities($contenu));
                    echo <<<carte
                        <div class='row'>
                            <div class='col-sm'>
                                <div class='card' >
                                    <div class='card-header'><span>$prenom $nom ($section $promotion)</span>
                                        <span class='float-right'>$dessin_chupa</span>
                                    </div>
                                    <div class='card-body'><div>
                                        $contenu
                                        </div><br><form method='post'> 
                                                <input type='submit' name='modifier$id'
                                                        class='btn btn-light' value='Modifier' /> 

                                                <input type='submit' name='supprimer$id'
                                                        class='btn btn-danger' value='Supprimer' /> 
                                        </form> 
                                    </div>
                                    <div class='card-footer text-muted'>Envoyé à $time</div>
                                </div>
                            </div>
                        </div> 
                        <br>
carte; 
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

