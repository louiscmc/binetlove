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
function insererUtilisateur($dbh,$section,$promotion,$nom,$prenom,$casert){
    $dbh->query("INSERT INTO `polytechniciens` (`Section`, `Promotion`, `Nom`, `Prenom`, `Casert`) VALUES ('$section', '$promotion', '$nom', '$prenom', '$casert')");
}

$dbh = null; // Déconnexion de MySQL
?>