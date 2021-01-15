<?php
    session_start();
    require("scripts/utils.php");
    require("classes/database.php");
    require("classes/utilisateur.php");
    require('scripts/printForms.php');
    require('scripts/logInOut.php');

    $err=false;
    $dbh= Database::connect();
<<<<<<< HEAD
    if(isset($_GET['page'])&& $_SESSION['loggedIn']){
        $askedPage=$_GET['page'];
    }
    else{
        if(isset($_GET['page']) && !$_SESSION['loggedIn']){
            $err=true;}
    
        $askedPage="welcome";}
    
=======
    $_SESSION['LAST_ACTIVITY'] = time(); 
    
    if(isset($_GET['page'])){
        $askedPage=$_GET['page'];
    }
    else{$askedPage="welcome";}

>>>>>>> 6268ad150394610fcf22e7da9dd131df965e43f6
    if (array_key_exists('todo',$_GET) && $_GET['todo']=='login'){
        logIn($dbh);
    }
    if (array_key_exists('todo',$_GET) && $_GET['todo']=='logout' || (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 60*30))){
        logOut();
    }
    $authorized= checkPage($askedPage);
    if($authorized){
        $pageTitle= getPageTitle($askedPage);
    }
    else{
        $pageTitle="erreur"; 
    }
    $utilisateur = getPrenom($dbh, $_SESSION['login']);
    $CSS="css/perso.css";
    generateHTMLHeader($pageTitle, $CSS, $utilisateur);
    ?>

    <div id=content>
        <?php
            if($authorized){
            require("pages/content_$askedPage.php");
            }
            else{echo "Cette page n'existe pas";}
        ?>                  
    </div>

        <?php 
        generateHTMLFooter();
        $dbh=null;
        ?>