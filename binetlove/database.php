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
function insererUtilisateur($dbh, $login,$nom,$prenom,$section,$promotion,$casert){
    $dbh->query("INSERT INTO polytechniciens ('login', 'nom', 'prenom','section', 'promotion', 'casert') VALUES ('$login', '$nom', '$prenom', $section', '$promotion', '$casert')");
}

function insererLettre($dbh, $login,$destinataire,$contenu,$date){
    $id=$dbh->query("SELECT COUNT(*) FROM lettre;")->fetchColumn()+1;
    $dbh->query("INSERT INTO lettre (id, login, destinataire, contenu, time, supprime) VALUES ($id,'$login', '$destinataire', '$contenu', '$date', 0)");
}

function supprimerLettre($dbh, $id){
    $dbh->query("UPDATE lettre SET supprime=1 WHERE id=$id");
}


function getDestinataire($dbh, $nom,$prenom,$section,$promotion){
    $result = $dbh->query("SELECT login FROM polytechniciens WHERE nom = '$nom' AND prenom = '$prenom' AND section = '$section' AND promotion = '$promotion'");
    $row = $result->fetch(PDO::FETCH_ASSOC);
    return $row['login'];
}

function getDestinataireReverse($dbh,$login){
    $result = $dbh->query("SELECT prenom, nom, section, promotion FROM polytechniciens WHERE login = '$login'");
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $data= array('prenom' =>$row['prenom'], 'nom' => $row['nom'], 'section' => $row['section'], 'promotion' => $row['promotion']);
    return $data;
}

function ac($dbh, $user_typed){
    if (strlen($user_typed)>2){
        $data = array();
        $sql = "select prenom, nom, section, promotion from polytechniciens where prenom like '%".$user_typed."%' or nom like '%".$user_typed."%' limit 10";
        $result = $dbh->query($sql);
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

function get_lettres($dbh, $login){
    $result = $dbh->query("SELECT id, destinataire, contenu, time FROM lettre WHERE login='$login' and supprime=0");
    global $data;
    $data = array();
    if ($result->rowCount() > 0){
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $id=$row['id'];
                $destinataire = $row['destinataire'];
                $contenu = $row['contenu'];
                $temps=$row['time'];
                setlocale(LC_ALL, 'fr_FR');
                $time= strftime('%T le %D', strtotime($temps));
                $desti_data= getDestinataireReverse($dbh, $destinataire);
                $prenom = $desti_data['prenom'];
                $nom=$desti_data['nom'];
                $section = $desti_data['section'];
                $promotion = $desti_data['promotion'];
                $stringid=strval($id);
                if(array_key_exists('supprimer'.$stringid, $_POST)) { 
                    supprimerLettre($dbh, $id);
                    header("Refresh:0");
                } 
                echo "
                    <div class='row'>
                        <div class='card' >
                            <div class='card-body'>
                                <h5 class='card-title'>$prenom $nom ($section $promotion)</h5>
                                <h6 class='card-subtitle mb-2 text-muted'>Envoyé à $time</h6>
                                <p class='card-text'>$contenu</p>
                                <form method='post'> 
                                        <input type='submit' name='modifier$id'
                                                class='btn btn-light' value='Modifier' /> 

                                        <input type='submit' name='supprimer$id'
                                                class='btn btn-danger' value='Supprimer' /> 
                                </form> 
                            </div>
                        </div>
                    </div> 
                    <br>
                "; 
            }
        } 
    else {
        echo "
                    <div class='row'>
                        <span>Vous n'avez pas encore envoyé de lettres :( </span>
        ";
    }
}
    

?>