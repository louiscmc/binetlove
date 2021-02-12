
            <div id="jumbo1" class="jumbotron jumbotron-fluid bg-faded">
              <div class="container">
                  <h1 class="display-4 text-focus-in">Spread <span class='red'>love</span>, not the virus</h1>
              </div>
            </div>
            <?php
                $contenu = $bienrecu = $desti ="";
                $contenuErr = $destinataireErr = "";
                $felicitation = false ;
                $numero=1;

                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    // on regarde si l'utilisateur a bien rempli tous les champs
                    if(isset($_POST['alea']) && $_POST['alea']=='Yes'){
                        $destinataire = dest_alea($dbh);
                    }
                    else{
                        if (empty($_POST["champ_cache"])) {
                                $destinataireErr = "Il faut remplir le prénom !";
                                $destinataire="";
                            } 
                            else {
                                $destinataire = test_input($_POST["champ_cache"]);
                        }
                    }
                    if (! empty($_POST["destinataire"])) {
                        $desti = test_input($_POST["destinataire"]);
                    }
                    
                    if (empty($_POST["contenu"])) {
                            $contenuErr = "Il faut remplir le contenu !"; 
                        } 
                        else {
                            $contenu = test_input($_POST["contenu"]);
                    }
                    $chupachups = 0;
                    if(isset($_POST['chupachups']) && $_POST['chupachups']=='Yes'){
                        $chupachups = 1;
                    }
                    $design = 'upload/design1.png';
                    if(isset($_POST['design'])){
                        $design=$_POST['design'];
                    }
                    if ($destinataire !="" && $contenu != ""){
                        $datetime = date_create()->format('Y-m-d H:i:s');
                            if (!empty($destinataire)){
                                if(isset($_POST['anonyme']) && $_POST['anonyme']=='Yes'){
                                    $envoyeur = 'anonyme';
                                }
                                else {$envoyeur = $_SESSION['login']; }
                                insererLettre($dbh,$envoyeur, $destinataire, addslashes($contenu), $design, $chupachups ,"$datetime"); 
                                $numero=getIdLettre($dbh,$envoyeur, $destinataire, $datetime);
                                if($numero%3==0 && $numero!=NULL){
                                    $felicitation=true;
                                    //updateGagnant($dhb,$envoyeur);
                                }
                                $bienrecu = "Votre lettre a bien été reçue ! <br> N'hésitez pas à en écrire une autre &#128151;";
                                $contenu = $destinataire = "";
                                $contenuErr = $destinataireErr = "";
                            } else {
                                $destinataireErr = "Ce Destinataire n'existe pas !";
                            }
                    }

                }
            ?>
            <form action="
                <?php 
                    $url = $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING'];
                    echo htmlspecialchars($url, ENT_QUOTES, 'utf-8');
                ?>
            " method="post"> 
            <div class="container-fluid">
                <div class="row">
                    <div class="col"></div>
                    <div class="col-6">
                        <?php
                        if ($destinataireErr!=''){echo"
                        <div class='alert alert-danger' role='alert'>
                             Ce destinataire n'existe pas !
                        </div>
                        ";}
                        if ($bienrecu!=''){echo"
                        <div class='alert alert-success' role='alert'>
                            $bienrecu
                        </div>
                        ";}
                        var_dump($felicitation);
                        var_dump($numero);
                        if ($felicitation==true){echo<<<felicitation
                            <a class="popup-with-zoom-anim" href="#small-dialog">Open with fade-zoom animation</a><br>
                            <!-- dialog itself, mfp-hide class is required to make dialog hidden -->
                            <div id="small-dialog" class="zoom-anim-dialog mfp-hide">
                                <h1>Dialog example</h1>
                                <p>Vous avez envoyé la $numero ème lettre de la campagne, vous avez gagné une sucette !!</p>
                            </div>
                           
felicitation;
                        }
                        if ($contenuErr!=""){echo"
                        <div class='alert alert-danger' role='alert'>
                             $contenuErr
                        </div>
                        ";}
                        ?>
                    </div>
                    <div class="col"></div>
                </div>
                <div class="row">                 
                    <div class="col-md-6 offset-md-1">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Destinataire</label>
                                <input class="form-control" name="destinataire" id="destinataire" placeholder="Prénom" value="<?php echo $desti ?>">
                                <input type="hidden" id="champ_cache" name="champ_cache">
                            </div>
                            <div class="form-group col-md-6">
                                <br>
                                <br>
                                <div class='container' style='text-align:right;'>
                                    <input class="form-check-input" type="checkbox" value="Yes" id="alea" name="alea">
                                    <label class="form-check-label" for="defaultCheck1">
                                        Destinataire aléatoire 💖
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                        <textarea class="form-control" name="contenu" id="contenu" placeholder="Votre lettre !" rows="12"><?php echo $contenu;?></textarea>
                                        <br>                              
                                    
                                </div>
                            </div>
                    </div>
                    <div class="col-md-4">
                        <p> Choisis ton design </p>
                        <div class="container vertical-scrollable">  
                            <div class="row text-center"> 
                            <?php
                                    $result = $dbh->prepare("SELECT image, nom, id "
                                        . "FROM images "
                                        . "WHERE selec=1 ");
                                    $result->execute();
                                    if ($result->rowCount() > 0){
                                        $count_design=1;
                                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                            $image=$row['image'];
                                            $nom = $row['nom'];
                                            $id=$row['id'];
                                            echo <<<lettre
                                                <div class=container> 
                                                    <img class="design" src="$image" >
                                                    <input type="radio" id='$nom' name="design" value="$image">
                                                    <label for="$nom">Design $count_design</label>
                                                    <br>
                                                    <br>
                                                    <br>
                                                </div>
lettre;
                                            $count_design++;
                                        }
                                    }
                                    ?>
                            </div>  
                        </div>
                        <div class="container-fluid">
                    <a class="btn btn-rose" href="index.php?page=design" role="button">Âme de graphiste ? Soumets un nouveau design !</a>
                         </div>
                    </div>
                </div>
                <div class="container-fluid col-md-6 offset-md-1">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Yes" id="anonyme" name="anonyme">
                        <label class="form-check-label" for="defaultCheck1">
                            Je souhaite envoyer cette lettre anonymement (&#9888; Vous ne pourrez plus modifier ou supprimer la lettre !)
                        </label>
                    </div>
                    <div class='form-check'>
                        <input class="form-check-input" type="checkbox" value="Yes" id="chupachups" name="chupachups">
                        <label class="form-check-label" for="defaultCheck1">
                        Envoyer une chupa-chups
                        </label>
                    </div>
                </div>
                <br>
                <div class="container-fluid col-md-2 offset-md-1">
                    <button type="submit" class="btn btn-rose" value="envoye" data-toggle="tooltip" title="N'oubliez pas de vous relire !">Envoyer</button>
                </div>
            </form>
                    <br>
                <div class="container-fluid col-md-2 offset-md-1">
                    <a class="btn btn-light" href="index.php?page=envoye" role="button">Voir les lettres envoyées</a>
                </div>
            </div>
            </form>  
            <br>
            <script src="ckeditor/ckeditor.js"></script>
            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
            <script src="js/jquery.magnific-popup.js"></script>
            <script>
                CKEDITOR.replace('contenu');
                // Popup 1000eme lettre :
                $(document).ready(function() {
                    $('.popup-with-zoom-anim').magnificPopup({
                        type: 'inline',

                        fixedContentPos: false,
                        fixedBgPos: true,

                        overflowY: 'auto',

                        closeBtnInside: true,
                        preloader: false,
                        
                        midClick: true,
                        removalDelay: 300,
                        mainClass: 'my-mfp-zoom-in'
                    });
                });
            </script>
