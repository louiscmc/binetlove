
<div class="container">
    <br>
    <br>
    <?php
    $login = $_SESSION['login'];
    $result = $dbh->prepare("SELECT id, image, selec "
            . "FROM images ");
    $result->execute();
        if ($result->rowCount() > 0){
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    //récupération des données 
                    $id=$row['id'];
                    $temps=$row['time'];
                    $time= strftime('%T le %D', strtotime($temps));
                    $image=$row['image'];
                    //gestion des images sélectionnées
                    $selec=$row['selec'];
                    $dessin_selec="❌";
                    $css_selec="rose";
                    $btn_selec="Selectionner cette image !";
                    if ($selec==1){
                        $dessin_selec="✅";
                        $btn_selec="Ne plus sélectionner cette image";
                        $css_selec="red";
                    }
                    // si bouton selectionné
                    if(array_key_exists('selec'.$stringid, $_POST)) { 
                        modifierSelec($dbh, $id, $selec);
                        echo"<script> location = location; </script>";
                    } 
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
                                                <input type='submit' name='selec$id' class='btn btn-$css_chupa' value='$btn_chupa' /> 
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
    <br>
</div>