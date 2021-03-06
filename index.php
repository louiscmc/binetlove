<!DOCTYPE html>
<?php
    define ('SITE_ROOT', realpath(dirname(__FILE__)));
    session_start();
    require("scripts/utils.php");
    require("classes/database.php");
    require("classes/utilisateur.php");
    require('scripts/printForms.php');
    require('scripts/logInOut.php');

    global $err ;
    $err=false;
    $dbh= Database::connect();
    if(isset($_GET['page'])&& (isset($_SESSION['loggedIn'])|| $_GET['page']=='register')){
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
    if($authorized=='nonadmin' || ($authorized=='admin' && isAdmin($dbh, $_SESSION['login']))){
        $pageTitle= getPageTitle($askedPage);
    }
    else{
        $pageTitle="erreur"; 
    }
    generateHTMLHeader($pageTitle);
    ?>

    <div id=content>
        <?php
            if($authorized=='nonadmin' || ($authorized=='admin' && isAdmin($dbh, $_SESSION['login']))){
            require("pages/content_$askedPage.php");
            }
            else{echo "Cette page n'existe pas";}
        ?>                  
    </div>

        <?php 
        generateHTMLFooter();
        $dbh=null;
        ?>