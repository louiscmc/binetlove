<?php

class Utilisateur {
    public $login;
    public $nom;
    public $prenom;
    public $password;
    
    public function __toString() {
        return "[{$this->login}] {$this->prenom}";
    }

    public static function getUser($dbh,$login){
        $query = "SELECT * FROM polytechniciens WHERE login = ?";
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
        $sth->execute(array($login));
        if ($user = $sth->fetch()){
            return $user;
        }
        else{
            return null;
        }
    }
}




function testPassword($dbh,$password){

}