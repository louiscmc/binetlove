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

function insererLettre($dbh, $login,$destinataire,$contenu, $design, $chupachups ,$date){
    $sth = $dbh->prepare("INSERT INTO lettre (login, destinataire, contenu, design, chupachups, time, supprime) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $sth -> execute(array($login, $destinataire, $contenu, $design, $chupachups, $date, 0));
}

function getIdLettre($dbh,$envoyeur, $destinataire, $datetime){
    $sth = $dbh->prepare("SELECT id FROM lettre WHERE login=? and destinataire=? and time=?");
    $sth -> execute(array($envoyeur, $destinataire, $datetime));
    $row= $sth->fetch(PDO::FETCH_ASSOC);
    return $row['id'];
}

function updateGagnant($dbh,$login){
    $sth = $dbh->prepare("UPDATE polytechniciens SET gagnant=? WHERE login=?");
    $sth -> execute(array(1,$login));
}

function modifierLettre($dbh, $id, $contenumod){
    $sth = $dbh->prepare("UPDATE lettre SET contenu=? WHERE id=?");
    $sth -> execute(array($contenumod,$id));
}

function supprimerLettre($dbh, $id){
    $sth= $dbh->prepare("UPDATE lettre SET supprime=1 WHERE id=?");
    $sth->execute(array($id));
}

function modifierChupa($dbh, $id, $chupa){
    if ($chupa==1) {$sth= $dbh->prepare("UPDATE lettre SET chupachups=0 WHERE id=?");}
    else{$sth= $dbh->prepare("UPDATE lettre SET chupachups=1 WHERE id=?");}
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
        if ($result->rowCount() > 0) {
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
    $nombre = $dbh->query('select count(*) from polytechniciens')->fetchColumn();
    $sql = "select login from polytechniciens where id = ?";
    $result = $dbh->prepare($sql);
    $result-> execute(array(rand(0,$nombre)));
    return $result->fetch(PDO::FETCH_ASSOC)['login'];
}

function insererImage($dbh, $nom, $login, $image){
    $sth = $dbh->prepare("INSERT INTO images (nom, login, image) VALUES (?, ?, ?)");
    $sth -> execute(array($nom, $login, $image));
}

function timeline($dbh){
    $lettres = array();
    $chupas = array();
    $sql = "select time, chupachups, login from lettre where supprime=0 order by time";
    $result = $dbh->prepare($sql);
    $result-> execute();
    $nb_lettre=0;
    $nb_chupa=0;
    $nb_nat=0;
    $nb_esc=0;
    $nb_roul=0;
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $nb_lettre++;
        $has_chupa=$row['chupachups'];
        $date_loc=date_create($row['time']);
        $login_local=$row['login'];
        $sec_loc=getDestinataireReverse($dbh,$login_local)['section'];
        switch ($sec_loc){
            case 'Natation' : $nb_nat++;
                break;
            case 'Escalade' : $nb_esc++;
                break;
            case 'Roulade' : $nb_roul++;
                break;
    }
    if ($has_chupa==1){
            $nb_chupa++;
            array_push($chupas, array('x' => $date_loc->getTimestamp()*1000, 'y' => $nb_chupa));
    }
    array_push($lettres, array('x' => $date_loc->getTimestamp()*1000, 'y' => $nb_lettre));
    $section = array('Natation' => $nb_nat, 'Escalade' => $nb_esc, 'Roulade' => $nb_roul);
    $data = array('lettres' => $lettres, 'chupas' => $chupas, 'section' => $section);
    }
    echo json_encode($data);
}

?>