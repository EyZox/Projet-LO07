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

function build_full_template($content, $params=null) {
	global $flashbag;
	if(empty($params['title'])) {
		$params['title'] = 'Projet-LO07';
	}
	include ROOT.'tpl/head.php';
	include ROOT.'tpl/header.php';
	?>
	<div id="wrapper-body">
		<?php include ROOT.'tpl/nav.php';?>
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

function build_template($content,  $params=null) {
	global $flashbag;
	if(empty($params['title'])) {
		$params['title'] = 'Projet-LO07';
	}
	include ROOT.'tpl/head.php';
	include ROOT.'tpl/header.php';
	?>
	<div id="wrapper-body">
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
?>