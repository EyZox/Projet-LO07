<?php
require_once __DIR__ . '/../utils/global.php';
require_once ROOT . 'security/auth_user.php';
require_once ROOT . 'utils/sql.php';

if(!empty($_GET['id']) && is_numeric($_GET['id'])) {
	$DB->beginTransaction();
	$error = true;
	$stmt = $DB->prepare('UPDATE trajet SET effectue=1 WHERE id=? AND conducteur=? AND depart<?');
	$currentDateTime = new DateTime();
	if($stmt->execute(array($_GET['id'], $_SESSION['UID'], $currentDateTime->format('Y-m-d H:i').':00'))){
		if($stmt->rowCount()>0) {
			/*CREDIT DU COMPTE*/
			$stmt = $DB->prepare('SELECT count(*) as participants, trajet.prix FROM trajet INNER JOIN reservation ON trajet.id = reservation.trajet WHERE trajet.id=? GROUP BY trajet.prix');
			if($stmt->execute(array($_GET['id']))) {
				if(($trajet = $stmt->fetch(PDO::FETCH_ASSOC))) {
					$credit = $trajet['participants']*$trajet['prix'];
					$stmt = $DB->prepare('UPDATE individu SET solde=solde+? WHERE id=?');
					if($stmt->execute(array($prix, $_SESSION['UID'])) && $stmt->rowCount() > 0) {
						alert('success', 'Vous avez été crédité de '.$credit.' €');
						$error = false;
					}
				}else {
					//Pas de reservation = pas de credit
					$error = false;
				}
				
			}
			/*---------------*/
		}
	}
	if($error) {
		$DB->rollBack();
		alert('error', 'Une erreur est survenue, impossible de valider le trajet');
	}else {
		$DB->commit();
		alert('success', 'Vous avez effectué le trajet');
	}
}


header ( 'Location: ' . ROOT_URL . 'annonce.php?id=' . $_GET['id'] );