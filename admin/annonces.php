<?php
require_once __DIR__ . '/../utils/global.php';
require_once ROOT . 'utils/sql.php';

if($_SESSION['ADMIN'] == TRUE) {
	$page = 1;
	if(!empty($_GET['p']) && is_numeric($_GET['p']) && $_GET['p']>0) {
		$page = $_GET['p'];
	}
	$stmt = $DB->prepare('SELECT id FROM trajet WHERE effectue=FALSE ORDER BY depart DESC LIMIT 30 OFFSET '.($page-1)*30);
	$stmt->execute();

	$params['title'] = 'Liste des annonces en cours';
	$params['req'] = $stmt;
	$params['page'] = $page;

	build_template('admin/annonces.php', $params, FALSE);
}
?>