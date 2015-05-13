<?php
require_once __DIR__.'/global.php';
session_destroy();
header('Location: '.ROOT_URL.'index.php');
?>