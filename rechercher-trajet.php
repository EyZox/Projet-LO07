<?php
require_once __DIR__ . '/utils/global.php';
require_once ROOT . 'security/auth_user.php';
require_once ROOT . 'utils/sql.php';

$params['title'] = 'Rechercher un trajet';

if(empty($_GET['ville_d'])) {
	$stmt = $DB->prepare('SELECT DISTINCT ville_d FROM trajet WHERE effectue=FALSE ORDER BY ville_d ASC');
	$stmt->execute();
	
	$params['req'] = $stmt;
	$params['label'] = 'Selectionnez une ville de départ';
	$params['field_name'] =  'ville_d';
	
	build_template('form/recherche-trajet-ville.php', $params);
	
}elseif(empty($_GET['ville_a'])) {
	$stmt = $DB->prepare('SELECT DISTINCT ville_a FROM trajet WHERE effectue=FALSE AND ville_d=? ORDER BY ville_a ASC');
	$stmt->execute(array($_GET['ville_d']));
	
	$params['req'] = $stmt;
	$params['label'] = 'Selectionnez une ville d\'arrivé';
	$params['field_name'] =  'ville_a';
	$params['hidden'] = array('ville_d' => $_GET['ville_d']);
	
	build_template('form/recherche-trajet-ville.php', $params);
	
}else {
	$stmt = $DB->prepare('SELECT depart, id FROM trajet WHERE effectue=FALSE AND ville_d=? AND ville_a=? ORDER BY depart DESC');
	$stmt->execute(array($_GET['ville_d'], $_GET['ville_a']));
	
	$params['req'] = $stmt;
	
	build_template('form/select-trajet-date.php', $params);
}