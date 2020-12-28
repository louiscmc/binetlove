
            <div id="jumbo1" class="jumbotron jumbotron-fluid bg-faded">
              <div class="container">
                  <h1 class="display-4 text-focus-in">Spread <span class='red'>love</span>, not the virus</h1>
              </div>
            </div>
            <?php
                $destinataire;
                $contenu = $bienrecu = "";
                $contenuErr = $destinataireErr = "";
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    
                    // on regarde si l'utilisateur a bien rempli tous les champs
                   
                    if (empty($_POST["destinataire"])) {
                            $destinataireErr = "Il faut remplir le prénom !";
                        } 
                        else {
                            $destinataire = test_input($_POST["destinataire"]);
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
                                insererLettre($dbh,"patate", $destinataire, $contenu,"$datetime"); 
                                $bienrecu = "Votre lettre a bien été reçue ! <br> N'hésitez pas à en écrire une autre &#128151;";
                                $contenu = $destinataire = "";
                                $contenuErr = $destinataireErr = "";
                            } else {
                                $destinataireErr = "Ce Destinataire n'existe pas !";
                            }
                            
                            $dbh = null;
                    }
                }
                
                

                function test_input($data) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
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
                            <div class="form-group col-md-12">
                                <label>Destinataire</label>
                                <input class="form-control" name="destinataire" id="destinataire" placeholder="Prénom">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-8">
                                <label for="contenu">Écris ton message !</label>
                                <textarea class="form-control" name="contenu" id="contenu" placeholder="Votre lettre !" rows="12"><?php echo $contenu;?></textarea>
                                <br>                              
                            </div>
                            <div class="col-md-4">
                                <br> 
                                <div class="card">
                                    <div class="card-body">
                                        <a href="#">&#128512;</a> <a href="#">&#128516;</a> <a href="#">&#128525;</a> <a href="#">&#128151;</a> <a href="#">&#128149;</a> <a href="#">&#128536;</a> <a href="#">&#128522;</a> <a href="#">&#128557;</a> <a href="#">&#128521;</a> 
                                        <a href="#">&#128546;</a> <a href="#">&#128526;</a> <a href="#">&#128513;</a> <a href="#">&#128527;</a> <a href="#">&#128064;</a> <a href="#">&#128150;</a> <a href="#">&#128523;</a>
                                        <a href="#">&#128152;</a> <a href="#">&#128158;</a> <a href="#">&#128561;</a> <a href="#">&#128293;</a> <a href="#">&#127881;</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                    <p>Choix du design</p>
                        <div class="row">
                            <div id="list-example" class="list-group col-md-1">
                                <a class="list-group-item list-group-item-action-rose" href="#list-item-1">1</a>
                                <a class="list-group-item list-group-item-action-rose" href="#list-item-2">2</a>
                                <a class="list-group-item list-group-item-action-rose" href="#list-item-3">3</a>
                                <a class="list-group-item list-group-item-action-rose" href="#list-item-4">4</a>
                                <a class="list-group-item list-group-item-action-rose" href="#list-item-5">5</a>
                                <a class="list-group-item list-group-item-action-rose" href="#list-item-6">6</a>
                                <a class="list-group-item list-group-item-action-rose" href="#list-item-7">7</a>
                                <a class="list-group-item list-group-item-action-rose" href="#list-item-8">8</a>
                            </div>
                            <div data-spy="scroll" data-target="#list-example" data-offset="0" class="scrollspy-example col-md-11">
                                <p id="list-item-1"></p>
                                <p id="list-item-2"></p>
                                <p id="list-item-3"></p>
                                <p id="list-item-4"></p>
                                <p id="list-item-5"></p>
                                <p id="list-item-6"></p>
                                <p id="list-item-7"></p>
                                <p id="list-item-8"></p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="container-fluid offset-md-1">
                <button type="submit" class="btn btn-rose" value="envoye">Envoyer</button>
                <br>
                </div>
            </div>
            </form>    
  <!--</form>-->
  