<div class="container">
    <br>
    <a class="btn btn-light float-right" href="index.php?page=letter" role="button">Revenir au formulaire</a>
    <?php
    $login = $_SESSION['login'];
    $result = $dbh->query("SELECT id, destinataire, contenu, time FROM lettre WHERE login='$login' and supprime=0");
        if ($result->rowCount() > 0){
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    $id=$row['id'];
                    $destinataire = $row['destinataire'];
                    $contenu = $row['contenu'];
                    $temps=$row['time'];
                    $time= strftime('%T le %D', strtotime($temps));
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
                        echo "
                            <div id='myForm'>
                                <form mehod='post'>
                                    <label for='contenumod'>Écris ton message !</label>
                                    <textarea class='form-control' name='contenumod' id='contenumod' placeholder='Votre lettre !' rows='12'>$contenu</textarea>
                                    <br>
                                    <button type='submit' class='btn btn-success' onclick='closeForm()'>Modifier</button>
                                    <button type='button' class='btn cancel' onclick='closeForm()'>Fermer</button>
                                </form>
                            </div>
                            <br>
                        ";
                        if(array_key_exists('contenumod', $_POST)){
                            modifierLettre($dbh, $id, $_POST('contenumod'));
                        }
                    }
                    echo "
                        <div class='row'>
                            <div class='card' >
                                <div class='card-body'>
                                    <h5 class='card-title'>$prenom $nom ($section $promotion)</h5>
                                    <h6 class='card-subtitle mb-2 text-muted'>Envoyé à $time</h6>
                                    <p class='card-text'>$contenu</p>
                                    <form method='post'> 
                                            <input type='submit' name='modifier$id'
                                                    class='btn btn-light' value='Modifier' /> 

                                            <input type='submit' name='supprimer$id'
                                                    class='btn btn-danger' value='Supprimer' /> 
                                    </form> 
                                </div>
                            </div>
                        </div> 
                        <br>
                    "; 
                }
            } 
        else {
            echo "
                        <div class='row'>
                            <span>Vous n'avez pas encore envoyé de lettres :( </span>
            ";
        }
    ?>
</div>

