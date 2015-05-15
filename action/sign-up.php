<?php
require_once __DIR__ . '/../global.php';
require_once ROOT . 'sql.php';


$auth = isset($_SESSION['auth']) && $_SESSION['auth'];

if(!$auth) {

	/* Si tout les champs remplis */
	if (! empty ( $_POST ['nom'] ) && ! empty ( $_POST ['prenom'] ) && ! empty ( $_POST ['datenaiss'] ) && ! empty ( $_POST ['login'] ) && ! empty ( $_POST ['mdp'] ) && ! empty ( $_POST ['image'] )) {
		$_SESSION['flashbag']['error'].='champ remplit -';
		$stmt = $DB->prepare("INSERT INTO individu (login, pass, nom, prenom, photo, datenaiss) VALUES (:login, :pass, :nom, :prenom, :photo, :datenaiss)");
		$stmt->bindValue(':login', $_POST ['login']);
		$stmt->bindValue(':pass', $_POST ['mdp']);
		$stmt->bindValue(':nom', $_POST ['nom']);
		$stmt->bindValue(':prenom', $_POST ['prenom']);
		$stmt->bindValue(':photo', $_POST ['image']);
		$stmt->bindValue(':datenaiss', $_POST ['datenaiss']);
	
		$auth = $stmt->execute();
			
	}
}

if($auth) {
	//Inscription réussit ou utilisateur déjà connecté
	$_SESSION['auth'] = TRUE;
	header('Location: '.ROOT_URL.'index.php');
}else {
	/*Echec de l'inscription*/
	$_SESSION['flashbag']['error'] = 'Erreur lors de l\'inscription, veuillez vérifier vos données';
	header('Location: '.ROOT_URL.'sign-up.php');
}

?>