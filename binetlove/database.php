<?php
class Database {
    public static function connect() {
        $dsn = 'mysql:dbname=binet_love;host=127.0.0.1';
        $user = 'root';
        $password = '';
        $dbh = null;
        try {
            $dbh = new PDO($dsn, $user, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        } catch (PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
            exit(0);
        }
        return $dbh;
    }
}
 
 
// opérations sur la base
$dbh = Database::connect();
function insererUtilisateur($dbh,$login,$nom,$prenom,$section,$promotion,$casert){
    $dbh->query("INSERT INTO 'polytechniciens' ('login', 'nom', 'prenom','section', 'promotion', 'casert') VALUES ('$login', '$nom', '$prenom', $section', '$promotion', '$casert')");
}

function insererLettre($dbh,$login,$destinataire,$contenu){
    $dbh->query("INSERT INTO 'lettre' ('login', 'destinataire', 'contenu','time') VALUES ($login,$destinataire, $contenu, $date=->getTimestamp())");
}

function getDestinataire($nom,$prenom,$section,$promotion){
    $dbh->query("SELECT 'login' FROM 'polytechniciens' WHERE 'nom'='$nom' AND 'prenom'='$prenom' AND 'section'='$section' AND 'promotion'=$promotion)");
}


?>