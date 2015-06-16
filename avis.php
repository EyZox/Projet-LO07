<?php
require_once __DIR__ . '/utils/global.php';
require_once ROOT . 'security/auth_user.php';
require_once ROOT . 'utils/sql.php';

$id;
if(empty($_GET['id']) || !is_numeric($_GET['id'])) {
	$id = $_SESSION['UID'];
}else {
	$id = $_GET['id'];
}

$page = 1;
if(!empty($_GET['p']) && is_numeric($_GET['p']) && $_GET['p']>0) {
	$page = $_GET['p'];
}

$stmt = $DB->prepare('SELECT avis.trajet, avis.evaluateur, avis.evalue, avis.note, avis.avis, trajet.depart, trajet.id as tid, individu.nom, individu.prenom, individu.photo FROM avis INNER JOIN trajet ON avis.trajet=trajet.id INNER JOIN individu ON avis.evaluateur=individu.id WHERE evalue=? ORDER BY trajet.depart DESC LIMIT 10 OFFSET '.(($page-1)*10));
$stmt->execute(array($id));


$params['title'] = 'Avis';
$params['req'] = $stmt;
$params['page'] = $page;
$params['id'] = $id;

build_template('avis.php', $params);