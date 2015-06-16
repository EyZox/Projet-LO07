<?php
require_once __DIR__ . '/utils/global.php';
require_once ROOT . 'security/auth_user.php';

if(!empty($_GET['uid']) && is_numeric($_GET['uid']) && !empty($_GET['tid']) && is_numeric($_GET['tid'])) {
	$params['title'] = 'Donnez votre feedback sur ce trajet';
	$params['uid'] = $_GET['uid'];
	$params['tid'] = $_GET['tid'];
	
	build_template('form/ecrire-avis.php', $params);
}else {
	header ( 'Location: ' . ROOT_URL. 'avis.php?id='.$_POST['uid'] );
}