<?php
require_once __DIR__.'/utils/global.php';

if(isAuth()) {
	header ( 'Location: ' . ROOT_URL );
	exit();
}

$params =  array('title' => 'Connexion');
if(empty($_SESSION['last-action']) || $_SESSION['last-action'] == ROOT_URL.'login.php') {
	$params['action'] =  ROOT_URL.'index.php';
}else {
	$params['action'] = $_SESSION['last-action'];
}

build_template('form/login.php', $params, FALSE);

?>