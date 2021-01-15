<?php
function logIn($dbh){
    if (array_key_exists('login',$_POST)&& array_key_exists('password',$_POST)){
        $login = $_POST['login'];
        $password = $_POST['password'];
        $user = Polytechniciens::getUser($dbh,$login);
        if ((!$user==null)&&$user->testPassword($dbh,$password)){
            $_SESSION['loggedIn']= true;
            $_SESSION['login']= $login;
            $_SESSION['user']=$user;
        }
        else{}
    }
}

function logOut(){
    $_SESSION['loggedIn']=false;
    unset($_SESSION['login']);
    session_destroy();
}
