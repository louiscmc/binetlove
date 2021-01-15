<?php
    session_start();
    require("scripts/utils.php");
    require("classes/database.php");
    require("classes/utilisateur.php");
    require('scripts/printForms.php');
    require('scripts/logInOut.php');

    global $err ;
    $err=false;
    $dbh= Database::connect();
    if(isset($_GET['page'])&& isset($_SESSION['loggedIn'])){
        $askedPage=$_GET['page'];
        $err=false;
    }
    else{
        if(isset($_GET['page']) && !isset($_SESSION['loggedIn']) && $_GET['page']!='welcome'){
            $err=true;}
    
        $askedPage="welcome";}
    
    if (array_key_exists('todo',$_GET) && $_GET['todo']=='login'){
        logIn($dbh);
    }
    if (array_key_exists('todo',$_GET) && $_GET['todo']=='logout' || (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 60*30))){
        logOut();
    }
    $_SESSION['LAST_ACTIVITY'] = time(); 
    global $askedPage;

    
    $authorized= checkPage($askedPage);
    if($authorized){
        $pageTitle= getPageTitle($askedPage);
    }
    else{
        $pageTitle="erreur"; 
    }
    //$utilisateur = getPrenom($dbh, $_SESSION['login']);
    $CSS="css/perso.css";
    generateHTMLHeader($pageTitle, $CSS);
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