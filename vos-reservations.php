<?php
require_once __DIR__ . '/utils/global.php';
require_once ROOT . 'security/auth_user.php';
require_once ROOT . 'utils/sql.php';

$stmt = $DB->prepare('SELECT id, depart, ville_a, ville_d, effectue FROM reservation INNER JOIN trajet ON reservation.trajet=trajet.id WHERE passager=? ORDER BY depart DESC');
if($stmt->execute(array($_SESSION['UID']))) {
	$params['titre'] = 'Vos reservations';
	$params['trajets'] = $stmt;
	build_template('form/vos-annonces.php', $params);
}else {
	alert('error', 'Une erreur est survenue : Impossible d\'afficher vos reservations');
	header ( 'Location: ' . ROOT_URL );
}