<?php

class Polytechniciens {
    public $login;
    public $nom;
    public $prenom;
    public $password;
    public $admin;
    public $section;
    public $promotion;
    public $casert;
    
    public function __toString() {
        return "[{$this->login}] {$this->prenom}";
    }

    public static function getUser($dbh,$login){
        $query = "SELECT * FROM polytechniciens WHERE login = ?";
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Polytechniciens');
        $sth->execute(array($login));
        if ($user = $sth->fetch()){
            return $user;
        }
        else{
            return null;
        }
    }

    function testPassword($dbh,$password){
        return $this->password==hash('sha1', $password);
    }

    function insertUser($dbh, $login, $password,$nom,$prenom,$section,$promotion,$casert){
        
    }
}


