<?php
require_once __DIR__.'/utils/global.php';
require_once ROOT.'security/auth_user.php';
require_once ROOT.'utils/sql.php';

define('MSG_WRONG_ID_OR_NO_PERMS', 'Le message que vous voulez consulter n\'existe plus ou vous n\'avez pas les permissions d\'y accéder');
define('MSG_ERROR', 'Une erreur est survenue : impossible de lire ce message');

$stmt = $DB->prepare ('SELECT content, expediteur, date FROM message WHERE id=? AND destinataire='.$_SESSION['UID'].';');
if($stmt->execute(($params['msg_page']-1)*MSG_PER_PAGE)) {
	$params['message'] = $stmt->fetch(PDO::FETCH_ASSOC);
	if(!$params['message']) {
		alert('error', MSG_WRONG_ID_OR_NO_PERMS);
		header('Location: '.ROOT_URL.'messagerie.php');
		exit();
	}else {
		$params['message']['expediteur'] = getUser($params['message']['expediteur']);
		$params['title'] = 'Message de '.$params['message']['expediteur']['nom'].' '.$params['message']['expediteur']['prenom'];
	}
}else {
	alert('error', MSG_ERROR);
	header('Location: '.ROOT_URL.'messagerie.php');
	exit();
}

//buildtemplate

?>