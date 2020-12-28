<?php

if (isset($_GET['prenom'])) {
    $id = $_GET['prenom']; 
}
if (strlen($id)>2){
    $sql = "select prenom from polytechniciens where prenom like '".$id."%' limit 10";
    $result = $dbh->query($sql);
    if ($result->rowCount() > 0){
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
     echo $row["prenom"]. "\n";
     }
    } else {
     echo "Pas trouvé :(";
}}
?>