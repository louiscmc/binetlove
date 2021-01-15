<?php
    session_start();
    require("classes/utils.php");
    require ("classes/database.php");
        
     // Check user login or not
     if(!isset($_SESSION['login'])){ 
       header('Location: classes/login.php');
       exit();
     }

     // logout
     if((isset($_POST['but_logout']))||(isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 60*30))){
        session_unset(); 
        session_destroy();
        header('Location: classes/login.php');
        exit();
     }

    $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp

?>
<!DOCTYPE html>
<html>
    <?php 
        if(isset($_GET['page'])){
            $askedPage=$_GET['page'];
        }
        else{$askedPage="welcome";}
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
            require("classes/content_$askedPage.php");
            }
            else{echo "Cette page n'existe pas";}
        ?>                  
    </div>

        <?php 
        generateHTMLFooter()
        ?>
    </body>
</html>
