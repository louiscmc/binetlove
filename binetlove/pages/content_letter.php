
            <div id="jumbo1" class="jumbotron jumbotron-fluid bg-faded">
              <div class="container">
                  <h1 class="display-4 text-focus-in">Spread <span class='red'>love</span>, not the virus</h1>
              </div>
            </div>
            <?php
                $contenu = $bienrecu = $desti ="";
                $contenuErr = $destinataireErr = "";
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    
                    // on regarde si l'utilisateur a bien rempli tous les champs
                   
                    if (empty($_POST["champ_cache"])) {
                            $destinataireErr = "Il faut remplir le prénom !";
                            $destinataire="";
                        } 
                        else {
                            $destinataire = test_input($_POST["champ_cache"]);
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
                    
                    if ($destinataire !="" && $contenu != ""){
                        $datetime = date_create()->format('Y-m-d H:i:s');
                            if (!empty($destinataire)){
                                if(isset($_POST['anonyme']) && $_POST['anonyme']=='Yes'){
                                    $envoyeur = 'anonyme';
                                }
                                else {$envoyeur = $_SESSION['login']; }
                                insererLettre($dbh,$envoyeur, $destinataire, addslashes($contenu),"$datetime"); 
                                $bienrecu = "Votre lettre a bien été reçue ! <br> N'hésitez pas à en écrire une autre &#128151;";
                                $contenu = $destinataire = "";
                                $contenuErr = $destinataireErr = "";
                            } else {
                                $destinataireErr = "Ce Destinataire n'existe pas !";
                            }
                            
                            $dbh = null;
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
                        ?>
                        <?php
                        if ($bienrecu!=''){echo"
                        <div class='alert alert-success' role='alert'>
                             $bienrecu
                        </div>
                        ";}
                        ?>
                        <?php 
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
                    <div class="col-md-7 offset-md-1">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Destinataire</label>
                                <input class="form-control" name="destinataire" id="destinataire" placeholder="Prénom" value="<?php echo $desti ?>">
                                <input type="hidden" id="champ_cache" name="champ_cache">
                            </div>
                            <div class="form-group col-md-6">
                                <br><br>
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
                    <div class="col-md-3">
                        <div class="container vertical-scrollable">  
                            <div class="row text-center">  
                                <div class="col-sm-8"> 
                                1</div>  
                                <div class="col-sm-8"> 
                                2</div>  
                                <div class="col-sm-8"> 
                                3</div>  
                                <div class="col-sm-8"> 
                                4</div>  
                                <div class="col-sm-8"> 
                                5</div>  
                                <div class="col-sm-8"> 
                                6</div>  
                                <div class="col-sm-8"> 
                                7</div>  
                            </div>  
                        </div>  
                    </div>
                </div>
                <div class="container-fluid col-md-7 offset-md-1">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Yes" id="anonyme" name="anonyme">
                        <label class="form-check-label" for="defaultCheck1">
                            Je souhaite envoyer cette lettre anonymement (&#9888; Vous ne pourrez plus modifier ou supprimer la lettre !)
                        </label>
                    </div>
                </div>
                <br>
                <div class="container-fluid col-md-2 offset-md-1">
                    <button type="submit" class="btn btn-rose" value="envoye">Envoyer</button>
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
            <script>
                CKEDITOR.replace('contenu');
            </script>
