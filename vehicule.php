<?php
require_once __DIR__.'/utils/global.php';
require_once ROOT.'security/auth_user.php';

$user = getUser();
$vehicule = getVehicule();
if(count($vehicule)>1) {
	$user['vehicule'] = $vehicule;
}

build_template('form/vehicule.php', array('title' => 'Votre véhicule', 'user' => $user));
?>