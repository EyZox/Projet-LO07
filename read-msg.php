<?php
require_once __DIR__.'/utils/global.php';
require_once ROOT.'security/auth_user.php';
require_once ROOT.'utils/sql.php';

define('MSG_DEFAULT_TITLE', 'Sans objet');
define('MSG_WRONG_ID_OR_NO_PERMS', 'Le message que vous voulez consulter n\'existe plus ou vous n\'avez pas les permissions d\'y accéder');
define('MSG_ERROR', 'Une erreur est survenue : impossible de lire ce message');

$stmt = $DB->prepare ('SELECT content, titre, expediteur, date FROM message WHERE id=? AND destinataire='.$_SESSION['UID'].';');
if($stmt->execute(array($_GET['id']))) {
	$params['message'] = $stmt->fetch(PDO::FETCH_ASSOC);
	if(!$params['message']) {
		alert('error', MSG_WRONG_ID_OR_NO_PERMS);
		header('Location: '.ROOT_URL.'messagerie.php');
		exit();
	}else {
		$params['message']['expediteur'] = getUser($params['message']['expediteur']);
		if(empty($params['message']['titre'])) $params['message']['titre'] = MSG_DEFAULT_TITLE;
		$params['title'] = 'Message de '.$params['message']['expediteur']['nom'].' '.$params['message']['expediteur']['prenom'];
	}
}else {
	alert('error', MSG_ERROR);
	header('Location: '.ROOT_URL.'messagerie.php');
	exit();
}

build_template('read-msg.php', $params);
	


?>