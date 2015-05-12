<?php

/* Constante pour la connexion a la base de données */
define("DB_HOST", "Localhost");
define("DB_PASSWORD", "");
define("DB_USER", "root");
define("DB_DATABASE", "covoiturage");

/* Connexion a la base de données */
try {
	$DB = new PDO('mysql:host='.DB_HOST.';dbname='.DB_DATABASE.';charset=utf8', DB_USER, DB_PASSWORD);
} catch (Exception $e) {
	die('Error : '.$e->getMessage());
}

?>