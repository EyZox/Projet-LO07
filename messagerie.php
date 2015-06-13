<?php
require_once __DIR__.'/utils/global.php';
require_once ROOT.'security/auth_user.php';
require_once ROOT.'utils/sql.php';

define('MSG_PER_PAGE', 10);

$params =  array('title' => 'Messagerie');
if(empty($_GET['page']) || !is_int($_GET['page'])) {
	$params['msg_page']=1;
}else {
	$params['msg_page'] = $_GET['page'];
}
$stmt = $DB->prepare ('SELECT id, expediteur, date FROM message WHERE destinataire='.$_SESSION['UID'].' ORDER BY date DESC LIMIT '.MSG_PER_PAGE.' OFFSET ?;');
if($stmt->execute(($params['msg_page']-1)*MSG_PER_PAGE)) {
	$params['messages'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$cache = array();
	foreach ($params['messages'] as $message) {
		if(empty($cache[$message['expediteur']])) {
			$user = getUser($message['expediteur']);
			$cache[$message['expediteur']] = $user['nom'].' '.$user['prenom'];
		}
		$message['expediteur'] = $cache[$message['expediteur']];
	}
}else {
	$params['messages'] = array();
}

build_template('messagerie.php', $params);

?>