<?php
require_once __DIR__.'/utils/global.php';
require_once ROOT.'security/auth_user.php';

$vehicule = getVehicule();
if(count($vehicule)>1) {
	build_template('form/proposer-trajet.php');
}else {
	alert('error','Vous devez enregistrer votre véhicule avant de pouvoir proposer un trajet');
	header('Location: '.ROOT_URL.'vehicule.php');
}