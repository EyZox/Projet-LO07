<?php
require_once __DIR__.'/../mysql_connect.php';
session_start();
if(!(isset($_SESSION['auth'])) /*|| $_SESSION['auth'] == "" */|| (!($_SESSION['auth']))) {
    $auth = FALSE;
    echo 'toto';
    if(isset($_POST['login']) && isset($_POST['mdp'])) {

        $query = mysqli_query($bdd, 'SELECT COUNT(*) FROM individu WHERE login="'.$_POST['login'].'" AND pass="'.$_POST['mdp'].'"');
        $result = mysqli_fetch_array($query,MYSQLI_NUM);
        $auth = $result[0] > 0;
        
    }
    
    if($auth) {
       $_SESSION['auth'] = TRUE;
    }else {
        //Erreur authentification
        $_SESSION['flashbag'] = 'Mauvais nom d\'utilisateur ou mauvais mot de passe';
        header('Location:'.__DIR__.'/../inscription_connexion/form_connexion.php');
    }
}