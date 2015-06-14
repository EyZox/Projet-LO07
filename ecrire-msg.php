<?php
require_once __DIR__ . '/utils/global.php';
require_once ROOT . 'security/auth_user.php';

if(empty($_GET['to']) || !is_numeric($_GET['to'])) {
	header ( 'Location: ' . ROOT_URL);
}else {
	$params['message']['expediteur']['id'] = $_GET['to'];
	$params['message']['titre'] = '';
	$params['title'] = 'Ecrire un message privé';
	build_template('form/write-msg.php', $params);
}