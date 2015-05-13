<?php
require_once __DIR__.'/global.php';


function getUser($id = null) {
	global $DB;
	if($id == null) {
		if(isAuth()) {
			$id = $_SESSION['UID'];
		}else {
			return array();
		}
	}
	
	$stmt = $DB->prepare('SELECT * FROM individu WHERE id=? ');
	$stmt->execute(array($id));
	$user = $stmt->fetch();
	if($user) {
		$user['pass'] = '';
		return $user;
	}else {
		return array();
	}
}