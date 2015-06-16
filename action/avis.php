<?php
require_once __DIR__ . '/../utils/global.php';
require_once ROOT . 'security/auth_user.php';
require_once ROOT . 'utils/sql.php';

function trajet_passager_valide() {
	global $DB;
	$stmt = $DB->prepare('SELECT count(*) FROM trajet INNER JOIN reservation ON trajet.id=reservation.trajet WHERE trajet.id=:tid AND (passager=:uid OR trajet.conducteur=:uid) AND trajet.effectue=TRUE');
	$stmt->bindValue(':tid', $_POST['tid']);
	$stmt->bindValue(':uid', $_SESSION['UID']);
	$stmt->execute();
	return ($stmt->fetchColumn() > 0);
}

if(empty($_POST['uid']) || !is_numeric($_POST['uid']) || empty($_POST['tid']) || !is_numeric($_POST['tid']) || !trajet_passager_valide()) {
	alert('error', 'Impossible de prendre en compte votre avis');
	header ( 'Location: ' . ROOT_URL );
}else {

	if(empty($_POST['note']) || !is_numeric($_POST['note'])) {
		alert('error', 'Vous devez spécifier une note');
	}elseif ($_POST['note'] < 0 || $_POST['note']>5) {
		alert('error', 'La note doit être comprise entre 0 et 5');
	}else {
		$text = null;
		if(!empty($_POST['avis'])) {
			$tmp = htmlspecialchars(trim($_POST['avis']));
			if(strlen($tmp) > 0) $text = $tmp;
		}
		
		$stmt = $DB->prepare('INSERT INTO avis (trajet, evaluateur, evalue, note, avis) VALUES (?,?,?,?,?)');
		if($stmt->execute(array($_POST['tid'], $_SESSION['UID'], $_POST['uid'], $_POST['note'], $text))) {
			alert('success', 'Votre avis a été pris en compte');
		}else {
			alert('error', 'Impossible de sauvegarder votre avis, il est possible que vous ayez déjà donner votre feedback sur ce trajet');
		}
		
		
	}
	
	
	
	header ( 'Location: ' . ROOT_URL. 'avis.php?id='.$_POST['uid'] );
}