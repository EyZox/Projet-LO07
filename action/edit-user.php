<?php
require_once __DIR__ . '/../global.php';
require_once ROOT . 'security/auth_user.php';
require_once ROOT . 'sql.php';

if (! empty ( $_POST ['nom'] ) && ! empty ( $_POST ['prenom'] )) {
	$bdd_param;
	if(validateAvatar($bdd_param)) {
		$stmt = $DB->prepare ( 'UPDATE individu SET nom=? , prenom=?, photo=? WHERE id=?' );
		$stmt->execute ( array (
				$_POST ['nom'],
				$_POST ['prenom'],
				$bdd_param,
				$_SESSION ['UID']
		) );
	}
}

header ( 'Location: ' . ROOT_URL . 'profil.php' );
?>