<?php
require_once __DIR__.'/../global.php';
require_once ROOT.'sql.php';

if(!(isset($_SESSION['auth'])) || (!($_SESSION['auth']))) {
	$auth = false;
	if(!empty($_POST['login']) && !empty($_POST['mdp'])) {
		$stmt = $DB->prepare('SELECT COUNT(*) FROM individu WHERE login=? AND pass=? ');
		$stmt->execute(array($_POST['login'], $_POST['mdp']));
		if($stmt->fetchColumn()) {
			//Authentification réussit
			$auth = true;
		}else {
			//Echec authentification (mauvais login ou pass)
			$_SESSION['flashbag']['error'] = 'Mauvais nom d\'utilisateur ou mauvais mot de passe';
		}
	}
	
	if($auth) {
		$_SESSION['auth'] = TRUE;
	}else {
		//Si pas authentifié : redirection vers page de connexion
		header('Location: '.ROOT_URL.'login.php');
	}	
}