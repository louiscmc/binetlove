<?php
    session_start();
    require("utils.php");
    require ("database.php");
        
     // Check user login or not
     if(!isset($_SESSION['userid'])){ 
       header('Location: login.php');
       exit();
     }

     // logout
     if(isset($_POST['but_logout'])){
       session_destroy();
       header('Location: login.php');
       exit();
     }

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
        $CSS="css/perso.css";
        generateHTMLHeader($pageTitle, $CSS);
    ?>
    <div id=content>
        <?php
            if($authorized){
            require("content_$askedPage.php");
            }
            else{echo "Cette page n'existe pas";}
        ?>                  
    </div>

        <?php 
        generateHTMLFooter()
        ?>
    </body>
</html>
