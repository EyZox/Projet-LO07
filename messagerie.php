<?php
require_once __DIR__.'/utils/global.php';
require_once ROOT.'security/auth_user.php';
require_once ROOT.'utils/sql.php';

define('MSG_DEFAULT_TITLE', 'Sans objet');
define('MSG_PER_PAGE', 10);

$params =  array('title' => 'Messagerie');

/* Pagination */
if(empty($_GET['page']) || !is_numeric($_GET['page'])) {
	$params['msg_page']=1;
}else {
	$params['msg_page'] = $_GET['page'];
}

/*Liste des messages*/
$stmt = $DB->prepare ('SELECT id, expediteur, date, titre FROM message WHERE destinataire='.$_SESSION['UID'].' ORDER BY date DESC LIMIT '.MSG_PER_PAGE.' OFFSET '.($params['msg_page']-1)*MSG_PER_PAGE);
if($stmt->execute()) {
	$params['messages'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$cache = array();
	foreach ($params['messages'] as $message) {
		/*Met le nom/prenom de l'emeteur a la place de son ID*/
		if(empty($cache[$message['expediteur']])) {
			$user = getUser($message['expediteur']);
			$cache[$message['expediteur']] = $user['nom'].' '.$user['prenom'];
		}
		$message['expediteur'] = $cache[$message['expediteur']];
		
		/*Met un titre par default si pas de titre*/
		if(empty($message['titre'])) {
			$message['titre'] = MSG_DEFAULT_TITLE;
		}
	}
	
	
}

build_template('messagerie.php', $params);

?>