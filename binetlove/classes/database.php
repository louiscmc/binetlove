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
$dbh= Database::connect();

function insererUtilisateur($dbh, $login, $password,$nom,$prenom,$section,$promotion,$casert){
    $sth = $dbh->prepare("INSERT INTO polytechniciens (login, admin, password , nom, prenom,section , promotion, casert) VALUES (?, ?, ?, ?, ?,?,?,?)");
    $sth -> exectute(array($login, 0, hash('sha1', $password),$nom,$prenom, $section, $promotion, $casert));
}

function insererLettre($dbh, $login,$destinataire,$contenu,$date){
    $sth = $dbh->prepare("INSERT INTO lettre (login, destinataire, contenu, time, supprime) VALUES (?, ?, ?, ?, ?)");
    $sth -> execute(array($login, $destinataire, $contenu, $date, 0));
}

function modifierLettre($dbh, $id, $contenumod){
    $sth = $dbh->prepare("UPDATE lettre SET contenu=? WHERE id=?");
    $sth -> execute(array($contenumod,$id));
}

function supprimerLettre($dbh, $id){
    $sth= $dbh->prepare("UPDATE lettre SET supprime=1 WHERE id=?");
    $sth->execute(array($id));
    
}

function getDestinataire($dbh, $nom,$prenom,$section,$promotion){
    $result = $dbh->prepare("SELECT login FROM polytechniciens WHERE nom = ? AND prenom = ? AND section = ? AND promotion = ?");
    $result -> execute(array($nom, $prenom,$section,$promotion));
    $row = $result->fetch(PDO::FETCH_ASSOC);
    return $row['login'];
}

function getDestinataireReverse($dbh,$login){
    $result = $dbh->prepare("SELECT prenom, nom, section, promotion FROM polytechniciens WHERE login = ?");
    $result -> execute(array($login));
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $data= array('prenom' =>$row['prenom'], 'nom' => $row['nom'], 'section' => $row['section'], 'promotion' => $row['promotion']);
    return $data;
}

function getPrenom($dbh, $login){
    $result = $dbh->prepare("SELECT prenom FROM polytechniciens WHERE login = ?");
    $result -> execute(array($login));
    $row = $result->fetch(PDO::FETCH_ASSOC);
    return $row['prenom'];
}

function ac($dbh, $user_typed){
    if (strlen($user_typed)>2){
        $data = array();
        $sql = "select prenom, nom, section, promotion from polytechniciens where prenom like ? or nom like ? limit 10";
        $result = $dbh->prepare($sql);
        $result-> execute(array('%'.$user_typed.'%','%'.$user_typed.'%'));
        if ($result->rowCount() > 0){
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $prenom = $row['prenom'];
                $nom = $row['nom'];
                $section = $row['section'];
                $promotion = $row['promotion'];
                $destinataire= getDestinataire($dbh, $nom, $prenom, $section, $promotion);
                array_push($data,array('label' => ''.$prenom.' '.$nom.' ('.$section.' '.$promotion.')', 'login' => $destinataire));
            }
        }
        else {
            array_push($data, array(label =>"Pas trouvé :(", login => "erreur"));
        }
    }
    echo json_encode($data);
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function dest_alea($dbh){
    $sql = "SELECT COUNT(*) from polytechniciens";
    $nombre = $dbh->prepare($sql);
    $nombre -> execute();
    $sql = "select prenom, nom, section, promotion from polytechniciens where id = ?";
    $result = $dbh->prepare($sql);
    $result-> execute(array(rand(0,$nombre)));

}
?>