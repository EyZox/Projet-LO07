<?php
require_once __DIR__ . '/../utils/global.php';
require_once ROOT . 'security/auth_user.php';
require_once ROOT . 'utils/sql.php';

$success = false;
if (! empty ( $_POST ['nom'] ) && ! empty ( $_POST ['prenom'] )) {
	$bdd_param;
	if(validateAvatar($bdd_param)) {
		$stmt = $DB->prepare ( 'UPDATE individu SET nom=? , prenom=?, photo=? WHERE id=?' );
		$success =$stmt->execute (array ($_POST ['nom'],$_POST ['prenom'],$bdd_param,$_SESSION ['UID']));
	}
}

if($success) {
	alert('success', 'Vos informations ont bien été enregistrées');
}else {
	alert('error', 'Les champs "Nom" et "Prénom" sont obligatoires');
}
header ( 'Location: ' . ROOT_URL . 'profil.php' );
?>