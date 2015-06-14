<?php
require_once __DIR__ . '/utils/global.php';
require_once ROOT . 'security/auth_user.php';
require_once ROOT . 'utils/sql.php';

if(empty($_GET['id']) || !is_numeric($_GET['id'])) {
	header('Location: '. empty($_SESSION['last-action'])?ROOT_URL:$_SESSION['last-action']);
	exit();
}else {
	$stmt = $DB->prepare('SELECT id, conducteur, depart, ville_a, ville_d, place, prix, effectue FROM trajet WHERE id=?');
	if($stmt->execute(array($_GET['id']))) {
		$params['trajet'] = $stmt->fetch(PDO::FETCH_ASSOC);
		if($params['trajet'] !== FALSE) {
			$params['conducteur'] = getUser($params['trajet']['conducteur']);
			if(count($params['conducteur']) > 0) {
				$stmt = $DB->prepare('SELECT individu.id, individu.nom, individu.prenom, individu.photo FROM reservation INNER JOIN individu ON reservation.passager = individu.id WHERE reservation.trajet=?');
				if($stmt->execute(array($_GET['id']))) {
					$params['passagers'] = $stmt;
					$params['titre'] = 'Annonce '.$params['trajet']['ville_d']. ' => '.$params['trajet']['ville_a'];
					build_template('annonce.php', $params);
					exit();
				}
			}
		}else {
			alert('error', 'L\'annonce demandée n\'existe pas ou n\'existe plus');
			header('Location: '. empty($_SESSION['last-action'])?ROOT_URL:$_SESSION['last-action']);
			exit();
		}
		
	}
}

alert('error', 'Une erreur est survenue, impossible d\'afficher l\'annonce');
header('Location: '. empty($_SESSION['last-action'])?ROOT_URL:$_SESSION['last-action']);
?>