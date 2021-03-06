<?php
function generateHTMLHeader($title){
    $act_letter="";
    $act_design="";
    $act_contact="";
    $act_stats="";
    switch ($title){
        case "Écrire une lettre": $act_letter=" active";
            break;
        case "Soumettre un design": $act_design=" active";
            break;
        case "Contact": $act_contact=" active";
            break;
        case "Statistiques": $act_stats=" active";
            break;
    }
    echo <<<CHAINE_DE_FIN
<!DOCTYPE html>
<html>
    <head>
        <title>$title</title>
        <link rel="icon" href="https://media.discordapp.net/attachments/671453585422155788/781895454858149888/Logo_Love.png">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!-- Captcha -->
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <!-- jQuery UI library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <!-- Graphes pour stats -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
        <!-- popup -->
        <link rel="stylesheet" href="css/magnific-popup.css">
        <script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
        <!-- CSS et scripts persos -->
        <link href="css/perso.css" rel="stylesheet">
        

    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-md navbar-dark  bg-pink">
                <a class="navbar-brand" href="index.php?page=welcome"> <img id="brand-image" alt="Logo" src="images\Logo_Love.png"> Binet Love</a>
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" style="">
                    <ul class="navbar-nav mr-auto">
CHAINE_DE_FIN;
                    if (isset($_SESSION['loggedIn'])){
                        echo <<<CHAINE_DE_FIN
                        <li class="nav-item$act_letter">
                            <a class="nav-link" href="index.php?page=letter">Écrire une lettre</a>
                        </li>
                        <li class="nav-item$act_design">
                            <a class="nav-link" href="index.php?page=design">Soumettre un Design</a>
                        </li>
                        <li class="nav-item$act_stats">
                            <a class="nav-link" href="index.php?page=stats">Statistiques</a>
                        </li>
CHAINE_DE_FIN;
                    }
                    echo <<<CHAINE_DE_FIN
                        <li class="nav-item$act_contact">
                            <a class="nav-link" href="index.php?page=contact">Contact</a>
                        </li>
                    </ul>
                </div>
                <div style="text-align:right">
CHAINE_DE_FIN;
if (isset($_SESSION['loggedIn'])){
    printLogoutForm();}
else {
    printLoginForm($_GET['page']);}
echo <<<CHAINE_DE_FIN
</div>
</nav>
</header>
CHAINE_DE_FIN;
}

function generateHTMLFooter(){ 
    echo <<<CHAINE_DE_FIN
            <footer class="container">
                <br>
                <p class="float-right"><a href="index.php" class="pink">Back to top</a></p>
                
                <p>© 2021 Louis Cattin--Mota de Campos, Mathilde André X2019
        </footer>

        </body>
        </html>
CHAINE_DE_FIN;}
    
$page_list = array(
    array(
    "name"=>"welcome",
    "title"=>"Binet Love",
    "menutitle"=>"Binet Love",
    "admin"=>0),
    array(
    "name"=>"design",
    "title"=>"Soumettre un design",
    "menutitle"=>"Soumettre un design",
    "admin"=>0),
     array(
    "name"=>"letter",
    "title"=>"Écrire une lettre",
    "menutitle"=>"Écrire une lettre",
    "admin"=>0),
    array(
    "name"=>"envoye",
    "title"=>"Lettres envoyées",
    "menutitle"=>"Lettres envoyées",
    "admin"=>0),
     array(
    "name"=>"contact",
    "title"=>"Nous contacter",
    "menutitle"=>"Nous contacter",
    "admin"=>0),
     array(
    "name"=>'merci',
    "title"=>"Merci !",
    "menutitle"=>"Merci !",
    "admin"=>0),
    array(
    "name"=>"register",
    "title"=>"S'inscrire",
    "menutitle"=>"S'inscrire",
    "admin"=>0),
    array(
    "name"=>"stats",
    "title"=>"Statistiques",
    "menutitle"=>"Statistiques",
    "admin"=>0),
    array(
    "name"=>"envoye_admin",
    "title"=>"Lettres ADMIN",
    "menutitle"=>"Lettres ADMIN",
    "admin"=>1),
    array(
        "name"=>"design_admin",
        "title"=>"Design ADMIN",
        "menutitle"=>"Design ADMIN",
        "admin"=>1)
    );

function checkPage($askedPage){
    global $page_list;
    foreach($page_list as $page){
        if ($askedPage === $page["name"] && $page["admin"] === 0){
            return 'nonadmin';
        }
        else if ($askedPage === $page["name"] || $page["admin"] === 1){
            return 'admin';
        }
    }
    return 'false';
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
