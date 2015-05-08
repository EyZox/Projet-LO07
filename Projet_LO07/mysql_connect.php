<?php
define("DB_HOST", "Localhost");
define("DB_PASSWORD", "");
define("DB_USER", "root");
define("DB_DATABASE", "covoiturage");

mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE) or die(mysqli_connect_error());

?>
