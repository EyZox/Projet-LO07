<?php
require_once __DIR__ . '/../utils/global.php';
require_once ROOT . 'security/auth_user.php';
require_once ROOT . 'utils/sql.php';

define('MSG_NO_DEST', 'Veuillez préciser un destinataire');
define('MSG_NO_CONTENT', 'Votre message est vide');
define('MSG_SUCCESS', 'Message envoyé');
define('MSG_ERROR', 'Erreur lors de l\'envoie du message');

if(!empty($_POST['to']) && !empty($_POST['msg'])) {
	$stmt = $DB->prepare ('INSERT INTO message (expediteur, destinataire, content, titre) VALUES (?,?,?,?);');
	if($stmt->execute(array($_SESSION['UID'], $_POST['to'], htmlspecialchars($_POST['msg'])), htmlspecialchars($_POST['titre']))) {
		alert('success', MSG_SUCCESS);
	}else {
		alert('error', MSG_ERROR);
	}
}elseif(empty($_POST['to'])) {
	alert('error', MSG_NO_DEST);
}else {
	alert('error', MSG_NO_CONTENT);
}

header('Location: '.ROOT_URL);

?>