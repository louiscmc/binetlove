
<div class="container">
    <br>
    <br>
    <?php
    $login = $_SESSION['login'];
    $result = $dbh->prepare("SELECT id, image, selec, login, time FROM images ");
    $result->execute();
        if ($result->rowCount() > 0){
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                //récupération des données 
                $login=$row['login'];
                $id=$row['id'];
                $stringid=strval($id);
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
                echo <<<carte
                
                    <div class='row'>
                        <div class='col-sm'>
                            <div class="card mb-3">
                                <img class="card-img-top" src="$image" alt="Card image">
                                <div class="card-body">
                                    <span class='float-right'>$dessin_selec</span>
                                    <form method='post'> 
                                        <input type='submit' name='selec$id' class='btn btn-$css_selec' value='$btn_selec' /> 
                                    </form> 
                                </div>
                                <div class='card-footer text-muted'>
                                        <span class="card-txt">
                                            Envoyé à $time par $login
                                        </span>
                                </div>
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
    <br>
</div>