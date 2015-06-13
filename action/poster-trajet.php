<?php 

require_once __DIR__ . '/../utils/global.php';
require_once ROOT . 'security/auth_user.php';
require_once ROOT . 'utils/sql.php';


$error = false;

if(empty($_POST['ville_d'])) {
	$error =true;
	alert('error', 'Veuillez renseigner la ville de départ');
}

if(empty($_POST['ville_a'])) {
	$error = true;
	alert('error', 'Veuillez renseigner la ville de d\'arrivée');
}

$date;
if(empty($_POST['date'])) {
	$error =true;
	alert('error', 'Veuillez renseigner une date de départ');
}else {
	$date = DateTime::createFromFormat('Y-m-d H:i', $_POST['date']);
	if($date === FALSE) {
		$error = true;
		alert('error', 'La date de départ n\'est pas au bon format (AAAA-MM-DD HH:mm)');
	}else if ($date <= new DateTime('+5 min')){
		$error = true;
		alert('error', 'La date de départ doit être d\'au moins 5 minutes après la date courrante');
	}
}

if(empty($_POST['place']) || !is_numeric($_POST['place'])) {
	$error = true;
	alert('error', 'Veuillez indiquer le nombre de place disponible');
}else if($_POST['place'] < 1){
	$error = true;
	alert('error', 'Le nombre de place disponible doit être supérieur à 0');
}

if(empty($_POST['prix']) || !is_numeric($_POST['prix'])) {
	$error = true;
	alert('error', 'Veuillez indiquer le prix demandé');
}else if($_POST['prix'] < 0){
	$error = true;
	alert('error', 'Le prix demandé doit être supérieur ou égal à 0');
}
	
if(!$error) {
	$stmt = $DB->prepare('INSERT INTO trajet (depart, ville_a, ville_d, place, conducteur) VALUES (?,?,?,?,?)');
	if($stmt->execute(array($date, htmlspecialchars($_POST['ville_a']), htmlspecialchars($_POST['ville_d']), $_POST['place'], $_SESSION['UID']))) {
		alert('success', 'Votre trajet a été publié avec succés');
	}else {
		$error = true;
		alert('error', 'Une erreur est survenue');
	}
}

if($error) {
	header('Location: '.ROOT_URL.'proposez-trajet.php');
}else {
	header('Location: '.ROOT_URL.'vos-annonces.php');
}

?>