<?php
class Database {
    public static function connect() {
        $dsn = 'mysql:dbname=binet_love;host=127.0.0.1';
        $user = 'root';
        $password = '';
        $dbh = null;
        try {
            $dbh = new PDO($dsn, $user, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"));
            $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        } catch (PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
            exit(0);
        }
        return $dbh;
    }
}
 
 
// opérations sur la base
global $dbh;
$dbh = Database::connect();
function insererUtilisateur($bh, $login,$nom,$prenom,$section,$promotion,$casert){
    $dbh->query("INSERT INTO polytechniciens ('login', 'nom', 'prenom','section', 'promotion', 'casert') VALUES ('$login', '$nom', '$prenom', $section', '$promotion', '$casert')");
}

function insererLettre($dbh, $login,$destinataire,$contenu,$date){
    $dbh->query("INSERT INTO lettre (login, destinataire, contenu, time) VALUES ('$login', '$destinataire', '$contenu', '$date')");
}


function getDestinataire($dbh, $nom,$prenom,$section,$promotion){
    $result = $dbh->query("SELECT login FROM polytechniciens WHERE nom = '$nom' AND prenom = '$prenom' AND section = '$section' AND promotion = '$promotion'");
    $row = $result->fetch(PDO::FETCH_ASSOC);
    return $row['login'];
}

function ac($dbh, $id, $user_typed){
    if (strlen($user_typed)>2){
        $data = array();
        $sql = "select distinct ".$id." from polytechniciens where ".$id." like '%".$user_typed."%' limit 10";
        $result = $dbh->query($sql);
        if ($result->rowCount() > 0){
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                array_push($data,$row[$id]);
            }
        } 
        else {
            array_push($data,"Pas trouvé :(");
        }
    }
    echo json_encode($data);
}


?>