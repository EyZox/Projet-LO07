<?php
require_once __DIR__.'/../global.php';
require_once ROOT.'sql.php';

if(!(isset($_SESSION['UID'])) || (!($_SESSION['UID']))) {
	$uid = false;
	if(!empty($_POST['login']) && !empty($_POST['mdp'])) {
		$stmt = $DB->prepare('SELECT id FROM individu WHERE login=? AND pass=? ');
		$stmt->execute(array($_POST['login'], $_POST['mdp']));
		$uid = $stmt->fetchColumn();
		if($uid) {
			//Authentification réussit
			$_SESSION['UID'] = $uid;
		}else {
			//Echec authentification (mauvais login ou pass)
			$_SESSION['flashbag']['error'] = 'Mauvais nom d\'utilisateur ou mauvais mot de passe';
		}
	}
	
	if(!$uid) {
		//Si pas authentifié : redirection vers page de connexion
		header('Location: '.ROOT_URL.'login.php');
	}	
}