<?php
class Database {

// fonction de connection à la base de données :
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

// Register : insère un nouvel utilisateur dans la base de données polytechniciens :
function insererUtilisateur($dbh,$login,$password, $nom, $prenom, $section, $promotion, $casert){
    $sth = $dbh->prepare("INSERT INTO polytechniciens (login, admin, password , nom, prenom, section , promotion, casert, gagnant) VALUES (?, ?, ?, ?, ?,?,?,?,?)");
    $sth -> execute(array($login, 0, hash('sha1', $password),$nom,$prenom, $section, $promotion, $casert,0));
}

// Register : vérifie que l'utilisateur n'est pas déjà incrit sur le site :
function checkLogin($dbh,$login){
    $result = $dbh->prepare("SELECT * FROM polytechniciens WHERE login = ?");
    $result -> execute(array($login));
    if($result->rowCount() > 0){
        return false;
    }
    else{
        return true ;
    }
}

// Letter : vérifie que le destinataire existe dans la base de données polytechniciens:
function checkDesti($dbh,$destinataire){
    $result = $dbh->prepare("SELECT * FROM polytechniciens WHERE login = ?");
    $result -> execute(array($destinataire));
    if($result->rowCount() > 0){
        return true;
    }
    else{
        return false;
    }
}

// Letter : insère une nouvelle lettre dans la base de données lettre :
function insererLettre($dbh, $login,$destinataire,$contenu, $design, $chupachups ,$date){
    $sth = $dbh->prepare("INSERT INTO lettre (login, destinataire, contenu, design, chupachups, time, supprime) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $sth -> execute(array($login, $destinataire, $contenu, $design, $chupachups, $date, 0));
}

// Letter : renvoie le numéro de la lettre (pour savoir si l'envoyeur a gagné ou non une sucette) :
function getIdLettre($dbh,$envoyeur, $destinataire, $datetime){
    $sth = $dbh->prepare("SELECT id FROM lettre WHERE login=? and destinataire=? and time=?");
    $sth -> execute(array($envoyeur, $destinataire, $datetime));
    $row= $sth->fetch(PDO::FETCH_ASSOC);
    return $row['id'];
}

// Letter : Modifie le champ gagnant de l'utilisateur lorqu'il envoie une lettre multiple de 100 :
function updateGagnant($dbh,$login){
    $sth = $dbh->prepare("UPDATE polytechniciens SET gagnant=? WHERE login=?");
    $sth -> execute(array(1,$login));
}

// Envoye : modifie le contenu de la lettre n°id :
function modifierLettre($dbh, $id, $contenumod){
    $sth = $dbh->prepare("UPDATE lettre SET contenu=? WHERE id=?");
    $sth -> execute(array($contenumod,$id));
}

// Envoye : Supprime la lettre n°id :
function supprimerLettre($dbh, $id){
    $sth= $dbh->prepare("UPDATE lettre SET supprime=1 WHERE id=?");
    $sth->execute(array($id));
}

// Envoye : Ajoute ou retire une sucette de la lettre n°id :
function modifierChupa($dbh, $id, $chupa){
    if ($chupa==1) {$sth= $dbh->prepare("UPDATE lettre SET chupachups=0 WHERE id=?");}
    else{$sth= $dbh->prepare("UPDATE lettre SET chupachups=1 WHERE id=?");}
    $sth->execute(array($id));
}

// Design admin : permet à l'admin de selectionner ou déselectionner le design n°id :
function modifierSelec($dbh, $id, $selec){
    if ($selec==1) {$sth= $dbh->prepare("UPDATE images SET selec=0 WHERE id=?");}
    else{$sth= $dbh->prepare("UPDATE images SET selec=1 WHERE id=?");}
    $sth->execute(array($id));
}

// Envoye : infos sur le destinataire :
function getDestinataireReverse($dbh,$login){
    $result = $dbh->prepare("SELECT prenom, nom, section, promotion FROM polytechniciens WHERE login = ?");
    $result -> execute(array($login));
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $data= array('prenom' =>$row['prenom'], 'nom' => $row['nom'], 'section' => $row['section'], 'promotion' => $row['promotion']);
    return $data;
}

// Permet d'avoir le prénom pour saluer l'utilisateur :
function getPrenom($dbh, $login){
    $result = $dbh->prepare("SELECT prenom FROM polytechniciens WHERE login = ?");
    $result -> execute(array($login));
    $row = $result->fetch(PDO::FETCH_ASSOC);
    return $row['prenom'];
}

// Letter : autocompletion :
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

// Pour éviter les attaques d'injection sql :
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Letter : destinataire aléatoire :
function dest_alea($dbh){
    $nombre = $dbh->query('select count(*) from polytechniciens')->fetchColumn();
    $sql = "select login from polytechniciens where id = ?";
    $result = $dbh->prepare($sql);
    $result-> execute(array(rand(0,$nombre)));
    return $result->fetch(PDO::FETCH_ASSOC)['login'];
}

// Design : ajoute une image dans la base de données :
function insererImage($dbh, $login, $image,$time){
    $sth = $dbh->prepare("INSERT INTO images (login, image, time, selec) VALUES (?, ?, ? , ?)");
    $sth -> execute(array($login, $image, $time, 0));
}

// Pages admins : teste si l'utilisateur a la fonction d'admin ou non :
function isAdmin($dbh, $login){
    $sql = "select admin from polytechniciens where login=?";
    $result = $dbh->prepare($sql);
    $result-> execute(array($login));
    $row = $result->fetch(PDO::FETCH_ASSOC);
    if ($row['admin']==1){
        return true;
    }
    else { 
        return false;
    }
}

// Stats : sort toutes les infos des lettres pour faires les graphes :
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
    $nb_avir=0;
    $nb_bad=0;
    $nb_bask=0;
    $nb_box=0;
    $nb_cross=0;
    $nb_pon=0;
    $nb_esc=0;
    $nb_foot=0;
    $nb_hand=0;
    $nb_judo=0;
    $nb_raid=0;
    $nb_rugby=0;
    $nb_ten=0;
    $nb_ulti=0;
    $nb_vol=0;
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
            case 'Aviron' : $nb_avir++;
                break;
            case 'Bad' : $nb_bad++;
                break;
            case 'Basket' : $nb_bask++;
                break;
            case 'Boxe' : $nb_box++;
                break;
            case 'Crossfit' : $nb_cross++;
                break;
            case 'Equitation' : $nb_pon++;
                break;
            case 'Escrime' : $nb_esc++;
                break;
            case 'Foot' : $nb_foot++;
                break;
            case 'Hand' : $nb_hand++;
                break;
            case 'Judo' : $nb_judo++;
                break;
            case 'Raid' : $nb_raid++;
                break;
            case 'Rugby' : $nb_rugby++;
                break;
            case 'Tennis' : $nb_ten++;
                break;
            case 'Ultimate' : $nb_ulti++;
                break;
            case 'Volley' : $nb_vol++;
                break;
    }
    if ($has_chupa==1){
            $nb_chupa++;
            array_push($chupas, array('x' => $date_loc->getTimestamp()*1000, 'y' => $nb_chupa));
    }
    array_push($lettres, array('x' => $date_loc->getTimestamp()*1000, 'y' => $nb_lettre));
    $section = array('Natation' => $nb_nat, 'Escalade' => $nb_esc, 'Roulade' => $nb_roul, 'Aviron' => $nb_avir, 'Bad' => $nb_bad, 'Basket' => $nb_bask, 'Boxe' => $nb_box, 'Crossfit' => $nb_cross, 'Equitation' => $nb_pon, 'Escrime' => $nb_esc, 'Foot' => $nb_foot, 'Hand' => $nb_hand, 'Judo' => $nb_judo, 'Raid' => $nb_raid, 'Rugby' => $nb_rugby, 'Tennis' => $nb_ten, 'Ultimate' => $nb_ulti, 'Volley' => $nb_vol);
    $data = array('lettres' => $lettres, 'chupas' => $chupas, 'section' => $section);
    }
    echo json_encode($data);
}

?>
