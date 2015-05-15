<?php
require_once __DIR__.'/../global.php';
require_once ROOT.'security/auth_user.php';
require_once ROOT.'sql.php';

$sucess = false;

if(!empty($_POST['plaque']) && !empty($_POST['marque']) && !empty($_POST['modele']) && !empty($_POST['couleur'])  && !empty($_POST['mise_en_serv'])) {
	$stmt;
	if(count(getVehicule())>1) {
		//Update
		$stmt = $DB->prepare('UPDATE vehicule SET plaque=:plaque, marque=:marque, modele=:modele, couleur=:couleur, mise_en_serv=:mes WHERE conducteur=:conducteur');	
	}else {
		//Set
		$stmt = $DB->prepare('INSERT INTO vehicule (plaque, marque, modele, couleur, mise_en_serv, conducteur) VALUES (:plaque, :marque, :modele, :couleur, :mes, :conducteur)');
	}
	$stmt->bindValue(':plaque', htmlspecialchars($_POST['plaque']));
	$stmt->bindValue(':marque', htmlspecialchars($_POST['marque']));
	$stmt->bindValue(':modele', htmlspecialchars($_POST['modele']));
	$stmt->bindValue(':couleur', htmlspecialchars($_POST['couleur']));
	$stmt->bindValue(':mes', htmlspecialchars($_POST['mise_en_serv']));
	$stmt->bindValue(':conducteur', $_SESSION['UID']);
	
	$sucess = $stmt->execute();
}

if($sucess) {
	alert('success', 'Vos informations ont bien été enregistrées');
}else {
	alert('error','Impossible d\'enregistrer votre véhicule, veuillez vérifier vos données');
}

header('Location: '.ROOT_URL.'vehicule.php');