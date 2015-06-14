<?php
require_once __DIR__.'/../utils/global.php';
if (!isset($_SERVER['PHP_AUTH_USER'])) {
	header('WWW-Authenticate: Basic realm="Acces Admin"');
	header('HTTP/1.0 401 Unauthorized');
	echo 'Cette page nécessite une authentification administrateur';
	exit;
} else if($_SERVER['PHP_AUTH_USER'] == 'admin' && $_SERVER['PHP_AUTH_PW'] == '1234'){
	
	$_SESSION['ADMIN'] = TRUE;
	
	build_template('admin/index.php', array('title' => 'Panneau d\'administration'), FALSE);
	
} else {
	header('HTTP/1.1 401 Unauthorized', true, 401);
	echo 'Cette page nécessite une authentification administrateur';
}
?>