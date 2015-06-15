<?php
require_once __DIR__ . '/../utils/global.php';
require_once ROOT . 'security/auth_user.php';
require_once ROOT . 'utils/sql.php';

if(empty($_GET['id']) || !is_numeric($_GET['id'])) {
	header ( 'Location: ' . ROOT_URL );
}else {
	$stmt = $DB->prepare('SELECT prix FROM trajet WHERE trajet.id=? AND trajet.conducteur <> ? AND trajet.effectue=FALSE AND place>0');
	$stmt->execute(array($_GET['id'],$_SESSION['UID']));
	$prix = $stmt->fetchColumn();
	if( $prix !== FALSE) {
		$stmt = $DB->prepare('SELECT solde FROM individu WHERE id=?');
		$stmt->execute(array($_SESSION['UID']));
		$solde = $stmt->fetchColumn();
		if($solde >= $prix) {
			$DB->beginTransaction();
			$stmt = $DB->prepare('UPDATE individu SET solde=solde-? WHERE id=?');
			$stmt->execute(array($prix,$_SESSION['UID']));
			
			$stmt = $DB->prepare('INSERT INTO reservation (trajet, passager) VALUES (?,?)');
			if($stmt->execute(array($_GET['id'], $_SESSION['UID']))) {
				$stmt = $DB->prepare('UPDATE trajet SET place=place-1 WHERE id=?');
				$stmt->execute(array($_GET['id']));
				$DB->commit();
				alert('success', 'Vous avez réservé votre trajet, votre compte vient d\'être débité de '.$prix.'€');
			}else {
				$DB->rollBack();
				alert('success', 'Impossible de valider votre réservation, vérifiez que vous n\'avez pas déjà réservé une place pour ce trajet');
			}
			
			
		}else {
			alert('error', 'Il vous manque '.($prix-$solde).'€ pour réserver votre place.<br/><a href="'.ROOT_URL.'profil.php">Recharger mon compte</a>');
		}
		
		header ( 'Location: ' . ROOT_URL.'annonce.php?id='.$_GET['id'] );
		
	}else {
		alert('error', 'Une erreur est survenue, impossible de reserver une place pour ce trajet');
		header ( 'Location: ' . ROOT_URL );
	}
}