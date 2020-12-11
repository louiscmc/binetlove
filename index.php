<!DOCTYPE html>
<html>
    <?php require("utils.php");
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
    <div id=content">
        <?php
            if($authorized){
            require("content_$askedPage.php");
            }
            else{echo 'pas autorisé';}
        ?>                  
    </div>
        <?php 
        generateHTMLFooter()
        ?>
</html>
