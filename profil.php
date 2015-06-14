<?php
require_once __DIR__.'/utils/global.php';
require_once ROOT.'security/auth_user.php';

if(empty($_GET['id']) || !is_numeric($_GET['id'])) {
	build_template(array('form/profil.php','form/change-pass.php','form/add-solde.php'), array('title' => 'Votre profil', 'user' => getUser()));
}else {
	$user = getUser($_GET['id']);
	if(count($user) > 0) {
		build_template('view-profil.php', array('title' => "Profil de $user[prenom]", 'user' => $user));
	}else {
		alert('error', 'Impossible de trouver cet utilisateur');
		header('Location: '. ROOT_URL);
		exit();
	}
	
}
?>