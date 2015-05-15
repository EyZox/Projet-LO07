<?php
require_once __DIR__.'/../utils/global.php';

function alert($level, $message) {
	$_SESSION['flashbag'][$level][] = $message;
}

$flashbag;
if(isset($_SESSION['flashbag'])) {
	$flashbag = $_SESSION['flashbag'];
	unset($_SESSION['flashbag']);
}

?>