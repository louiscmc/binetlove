<?php
function generateHTMLHeader($title, $CSS){
    $act_letter="";
    $act_design="";
    $act_contact="";
    switch ($title){
        case "Écrire une lettre": $act_letter=" active";
            break;
        case "Soumettre un design": $act_design=" active";
            break;
        case "Contact": $act_contact=" active";
            break;
    }
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
                <a class="navbar-brand" href="index.php?page=welcome"> <img id="brand-image" alt="Logo" src="https://media.discordapp.net/attachments/671453585422155788/781895454858149888/Logo_Love.png?width=679&height=679"> Binet Love</a>
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" style="">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item$act_letter">
                            <a class="nav-link" href="index.php?page=letter">Écrire une lettre</a>
                        </li>
                        <li class="nav-item$act_design">
                            <a class="nav-link" href="index.php?page=design">Soumettre un Design</a>
                        </li>
                        <li class="nav-item$act_contact">
                            <a class="nav-link" href="index.php?page=contact">Contact</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
    <body>
CHAINE_DE_FIN;}

function generateHTMLFooter(){ 
    echo <<<CHAINE_DE_FIN
            <footer class="container">
                <p class="float-right"><a href="index.php" class="pink">Back to top</a></p>
                <p>© 2021 Louis Cattin--Mota de Campos, Mathilde André X2019
        </footer>
CHAINE_DE_FIN;}
    
$page_list = array(
    array(
    "name"=>"welcome",
    "title"=>"Binet Love",
    "menutitle"=>"Binet Love"),
    array(
    "name"=>"design",
    "title"=>"Soumettre un design",
    "menutitle"=>"Soumettre un design"),
     array(
    "name"=>"letter",
    "title"=>"Écrire une lettre",
    "menutitle"=>"Écrire une lettre"),
     array(
    "name"=>"contact",
    "title"=>"Nous contacter",
    "menutitle"=>"Nous contacter"),
    );

function checkPage($askedPage){
    global $page_list;
    foreach($page_list as $page){
        if ($askedPage === $page["name"]){
            return true;
        }  
    }
    return false;
}

function getPageTitle($name){
    global $page_list;
    foreach($page_list as $page){
        if ($name === $page["name"]){
            return $page["title"];
        }
    }
}

?>