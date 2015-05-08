<?php

require_once __DIR__.'/../mysql_connect.php';
require_once __DIR__.'/../functions.php';

if(issetNotEmpty($_POST['nom']) && issetNotEmpty($_POST['prenom']) && issetNotEmpty($_POST['datenaiss']) && issetNotEmpty($_POST['login']) && issetNotEmpty($_POST['image']) && issetNotEmpty($_POST['mdp'])) {
    if(mysqli_query($bdd, 'INSERT INTO individu (login, pass, nom, prenom, photo, datenaiss) VALUES ("'.$_POST['login'].'","'.$_POST['mdp'].'","'.$_POST['nom'].'","'.$_POST['prenom'].'","'.$_POST['image'].'","'.$_POST['datenaiss'].'")')){
        //inscription réussit
        echo 'inscription réussit';
    }
}

 echo 'erreur lors de l\'inscription';
