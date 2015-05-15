<?php
require_once __DIR__ . '/../global.php';
require_once ROOT . 'sql.php';

if(!isAuth()) {
	if (! empty ( $_POST ['nom'] ) && ! empty ( $_POST ['prenom'] ) && ! empty ( $_POST ['datenaiss'] ) && ! empty ( $_POST ['login'] ) && ! empty ( $_POST ['pass'] )) {
		$DB->beginTransaction();
		$transaction = false;
		
		$stmt = $DB->prepare("INSERT INTO individu (login, pass, nom, prenom, datenaiss) VALUES (:login, :pass, :nom, :prenom, :datenaiss)");
		$stmt->bindValue(':login', $_POST ['login']);
		$stmt->bindValue(':pass', $_POST ['pass']);
		$stmt->bindValue(':nom', $_POST ['nom']);
		$stmt->bindValue(':prenom', $_POST ['prenom']);
		$stmt->bindValue(':datenaiss', $_POST ['datenaiss']);
			
		if($stmt->execute()) {
			require_once ROOT.'security/auth_user.php';
			if(isAuth()) {
				$bdd_img_param;
				if(validateAvatar($bdd_img_param)) {
					$stmt = $DB->prepare('UPDATE individu SET photo=? WHERE id=?');
					$transaction = $stmt->execute(array($bdd_img_param, $_SESSION['UID']));
				}
			}
		}
			
		if($transaction) {
			$DB->commit();
		}else {
			$DB->rollBack();
			$_SESSION['UID'] = FALSE;
		}
	}
}
if(isAuth()) {
	//Inscription réussit ou utilisateur déjà connecté
	header('Location: '.ROOT_URL.'index.php');
}else {
	/*Echec de l'inscription*/
	$_SESSION['flashbag']['error'] = 'Erreur lors de l\'inscription, veuillez vérifier vos données';
	header('Location: '.ROOT_URL.'sign-up.php');
}

?>