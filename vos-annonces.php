<?php
require_once __DIR__ . '/utils/global.php';
require_once ROOT . 'security/auth_user.php';
require_once ROOT . 'utils/sql.php';

$stmt = $DB->prepare('SELECT id, depart, ville_a, ville_d FROM trajet WHERE conducteur=? ORDER BY depart DESC');
if($stmt->execute(array($_SESSION['UID']))) {
	$params['titre'] = 'Vos annonces';
	$params['trajets'] = $stmt;
	build_template('form/vos-annonces.php', $params);
}else {
	alert('error', 'Une erreur est survenue : Impossible d\'afficher vos annonces');
	header ( 'Location: ' . ROOT_URL );
}