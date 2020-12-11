
<?php
function generateHTMLHeader($title, $CSS){
    global $title;
    global $CSS;
    echo <<<CHAINE_DE_FIN
    <head>
        <title>$title</title>
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
        <link href="$CSS" rel="stylesheet">
    </head>
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
    <body>
CHAINE_DE_FIN;}

function generateHTMLFooter(){ 
    echo <<<CHAINE_DE_FIN
        </body>
            <footer class="container">
                <p class="float-right"><a href="index.php" class="pink">Back to top</a></p>
                <p>© 2021 Louis Cattin--Mota de Campos, Mathilde André X2019
        </footer>
CHAINE_DE_FIN;}
    
$page_list = array(
    "index.php",
    "submit_design.php",
    "submit_letter.php",
    "contact.php",
);

function checkPage($askedPage){
    foreach($page_list as $page){
          if ($askedPage == $page){ //Premier cas possible
    return true;
    }
    return false;
    }
}


?>
</html>

