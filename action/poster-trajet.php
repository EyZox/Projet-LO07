<?php 
$error = false;

if(empty($_POST['ville_d']) {
	$error =true;
	alert('error', 'Veuillez renseigner la ville de départ');
}

if(empty($_POST['ville_a'])) {
	$error = true;
	alert('error', 'Veuillez renseigner la ville de d\'arrivée');
}

if(empty($_POST['date'])) {
	$error =true;
	alert('error', 'Veuillez renseigner une date de départ');
}else {
	$date = date('Y-m-d H:i', $_POST['date']);
		
}
?>