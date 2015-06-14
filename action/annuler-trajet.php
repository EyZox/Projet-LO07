<?php
require_once __DIR__ . '/../utils/global.php';
require_once ROOT . 'security/auth_user.php';
require_once ROOT . 'utils/sql.php';

if(!empty($_GET['id']) && is_numeric($_GET['id'])) {
	
	$stmt = $DB->prepare('SELECT conducteur, effectue, prix FROM trajet WHERE trajet.id = ?');
	$stmt->execute(array($_GET['id']));
	$trajet = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($trajet == false) {
		alert('error', 'L\'annonce n\'existe pas');
		header ( 'Location: ' . ROOT_URL );
		exit();
	}
	
	if($trajet['conducteur'] != $_SESSION['UID']) {
		alert('error', 'Vous ne pouvez pas annuler un trajet si vous n\'êtes pas l\'hôte');
		header ( 'Location: ' . ROOT_URL . 'annonce.php?id=' . $_GET['id'] );
		exit();
	}
	
	if($trajet['effectue']) {
		alert('error', 'Vous ne pouvez pas annuler un trajet déjà effectué');
		header ( 'Location: ' . ROOT_URL . 'annonce.php?id=' . $_GET['id'] );
		exit();
	}
	
	
	$stmt = $DB->prepare('SELECT count(*) as nb_passagers FROM reservation WHERE trajet=?');
	$stmt->execute(array($_GET['id']));
	$nb_passagers = $stmt->fetchColumn();
		
	if($nb_passagers > 0) {
		if(empty($_GET['proceed']) || $_GET['proceed'] != 1) {
			$params['title'] = 'Confirmer l\'annulation du trajet';
			$params['nb_passagers'] = $nb_passagers;
			$params['trajet']['id'] = $_GET['id'];
			build_template('confirm-annuler-trajet.php', $params);
			exit();
		}else {
			//penalités
			$stmt = $DB->prepare('UPDATE individu SET solde=solde-? WHERE id=?');
			$stmt->execute(array($nb_passagers*10, $_SESSION['UID']));
			alert('info', 'Vous avez reçu une pénalité de '.($nb_passagers*10).'€ pour avoir annuler un trajet avec reservation(s)');
			//envoie message
			$stmt = $DB->prepare('SELECT passager FROM reservation WHERE trajet=?');
			if($stmt->execute(array($_GET['id']))) {
				while(($passager = $stmt->fetch(PDO::FETCH_ASSOC))) {
					$remb = $DB->prepare('UPDATE individu SET solde=solde+? WHERE id=?');
					$remb->execute(array($trajet['prix'], $passager['passager']));
					sendMessage($_SESSION['UID'], $passager['passager'], 'Je suis désolé, mais je suis dans l\'obligation d\'annuler mon trajet. Vous avez été remboursé ', 'Trajet annulé', FALSE);
				}
			}
		}
	}
			
	$stmt = $DB->prepare('DELETE FROM trajet WHERE id=?');
	$stmt->execute(array($_GET['id']));
	alert('success', 'Annonce supprimée');
	
}

header ( 'Location: ' . ROOT_URL . 'vos-annonces.php');