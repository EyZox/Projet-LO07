<?php
require_once __DIR__.'/../utils/global.php';
require_once ROOT.'utils/sql.php';

if(!isAuth()) {
	$uid = false;
	if(!empty($_POST['login']) && !empty($_POST['pass'])) {
		$stmt = $DB->prepare('SELECT id, nom, prenom FROM individu WHERE login=? AND pass=? ');
		$stmt->execute(array($_POST['login'], $_POST['pass']));
		$res = $stmt->fetch(PDO::FETCH_ASSOC);
		if($res) {
			//Authentification réussit
			$_SESSION['UID'] = $res['id'];
			$_SESSION['nom'] = $res['nom'];
			$_SESSION['prenom'] = $res['prenom'];
		}else {
			//Echec authentification (mauvais login ou pass)
			alert('error','Mauvais nom d\'utilisateur ou mauvais mot de passe');
		}
	}
	
	if(!$uid) {
		//Si pas authentifié : redirection vers page de connexion
		header('Location: '.ROOT_URL.'login.php');
	}	
}