<!DOCTYPE html>
<html>
    <head>
        <title>Écrire une lettre | Binet Love</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!-- Mon CSS Perso -->
        <link href="css/perso.css" rel="stylesheet">
        
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-md navbar-dark  bg-pink">
                <a class="navbar-brand" href="index.php"> <img id="brand-image" alt="Logo" src="https://media.discordapp.net/attachments/671453585422155788/781895454858149888/Logo_Love.png?width=679&height=679"> Binet Love</a>
                <!-- en cas de collapse de la navbar on va avoir le texte Modal Web tout à gauche et la version collapsée tout à droite -->
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="navbar-collapse collapse" id="navbarSupportedContent" style="">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="submit_letter.php">Ecrire une lettre</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="submit_design.php">Soumettre un Design</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="contact.php">Contact</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
            <div class="jumbotron jumbotron-fluid bg-faded">
              <div class="container">
                  <h1 class="display-4">Spread <span class='red'>love</span>, not the virus</h1>
              </div>
            </div>
            <div class="container-fluid">
                <div class="row">                 
                    <div class="col-md-7 offset-md-1">
                       <form>
                           <div class="row">
                            <div class="form-group col-md-4">
                              <label for="exampleFormControlInput1">Nom de l'élu.e</label>
                              <input type="search" class="form-control" id="exampleFormControlInput1" placeholder="Prénom Nom">
                            </div>
                            <div class="form-group col-md-4">
                              <label for="exampleFormControlSelect1">Promotion</label>
                              <select class="form-control" id="exampleFormControlSelect1">
                                 <option>Choisir une promotion</option>
                                <option>X 2018</option>
                                <option>X 2019</option>
                                <option>X 2020</option>
                                <option>Bachelor 1</option>
                                <option>Bachelor 2</option>
                                <option>Bachelor 3</option>
                                <option>Master</option>
                              </select>
                            </div>
                            <div class="form-group col-md-4">
                              <label for="exampleFormControlSelect2">Section</label>
                              <select class="form-control" id="exampleFormControlSelect2">
                                <option>Choisir une section</option>
                                <option>Aviron</option>
                                <option>Bad</option>
                                <option>Basket</option>
                                <option>Boxe</option>
                                <option>Équitation</option>
                                <option>Escalade</option>
                                <option>Escrime</option>
                                <option>Foot</option>
                                <option>Hand</option>
                                <option>Judo</option>
                                <option>Natation</option>
                                <option>Raid</option>
                                <option>Rugby</option>
                                <option>Tennis</option>
                                <option>Ultimate</option>
                                <option>Volley</option>
                              </select>
                            </div>
                            </div>
                           <div class="row">
                            <div class="form-group col-md-8">
                              <label for="exampleFormControlTextarea1">Écris ton message !</label>
                              <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Écris ton message" rows="12"></textarea>
                              <br>
                              <button type="submit" class="btn btn-rose">Envoyer</button>
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
                    </form>
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
            </div>
       
        <footer class="container">
            <p class="float-right"><a href="submit_letter.php" class="pink">Back to top</a></p>
            <p>© 2021 Louis Cattin--Mota de Campos, Mathilde Andre X2019
        </footer>
    </body>
</html>