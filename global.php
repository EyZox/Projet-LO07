<?php

define('ROOT', __DIR__.'/');
define('ROOT_URL', "http://$_SERVER[HTTP_HOST]/Projet-LO07/");

session_start();
if(isset($_SESSION['current-action']))  $_SESSION['last-action'] =  $_SESSION['current-action'];
$_SESSION['current-action'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

//$_SESSION['last-request'] = date();

$flashbag;
if(isset($_SESSION['flashbag'])) {
	$flashbag = $_SESSION['flashbag'];
	unset($_SESSION['flashbag']);
}

function build_template($content,  $params=null, $nav=TRUE) {
	global $flashbag;
	
	if(empty($params['title'])) {
		$params['title'] = 'Projet-LO07';
	}
	
	if(empty($params['user'])) {
		$params['user'] = getUser();
	}
	include ROOT.'tpl/head.php';
	include ROOT.'tpl/header.php';
	?>
	<div id="wrapper-body">
		<?php if($nav) include ROOT.'tpl/nav.php';?>
		<div id="wrapper-content-out">
			<div id="wrapper-content-in">
				<section id="content">
					<?php include ROOT.'tpl/'.$content;?>
				</section>
			</div>
		</div>
		<div class="clear-both"></div>
	</div>
	<?php include ROOT.'tpl/footer.php';
}

function isAuth() {
	return isset($_SESSION['UID']) && $_SESSION['UID'];
}

function getUser($id = null) {
	global $DB;
	require_once ROOT.'sql.php';
	
	
	if($id == null) {
		if(isAuth()) {
			$id = $_SESSION['UID'];
		}else {
			return array();
		}
	}

	$stmt = $DB->prepare('SELECT * FROM individu WHERE id=?');
	$stmt->execute(array($id));
	$user = $stmt->fetch(PDO::FETCH_ASSOC);
	if($user) {
		$user['pass'] = '';
		return $user;
	}else {
		return array();
	}
}
?>