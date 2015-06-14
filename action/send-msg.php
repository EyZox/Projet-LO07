<?php
require_once __DIR__ . '/../utils/global.php';
require_once ROOT . 'security/auth_user.php';
require_once ROOT . 'utils/sql.php';

define('MSG_NO_DEST', 'Veuillez préciser un destinataire');
define('MSG_NO_CONTENT', 'Votre message est vide');


if(!empty($_POST['to']) && !empty($_POST['msg'])) {
	sendMessage($_SESSION['UID'], $_POST['to'], htmlspecialchars($_POST['msg']), empty($_POST['titre'])?NULL:htmlspecialchars($_POST['titre']));
}elseif(empty($_POST['to'])) {
	alert('error', MSG_NO_DEST);
}else {
	alert('error', MSG_NO_CONTENT);
}

header('Location: '.ROOT_URL);
?>