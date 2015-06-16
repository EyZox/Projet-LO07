<?php 
    require_once __DIR__.'/utils/global.php';    
	require_once ROOT.'security/auth_user.php';
	require_once ROOT . 'utils/sql.php';
	
	$stmt = $DB->prepare('SELECT count(*) FROM trajet WHERE effectue=FALSE');
	$stmt->execute();
	$params['nb_trajet'] = $stmt->fetchColumn();
	
	$stmt = $DB->prepare('SELECT count(*) FROM trajet WHERE effectue=TRUE');
	$stmt->execute();
	$params['nb_trajet_total'] = $stmt->fetchColumn();
	
	$params['title'] = 'Votre tableau de bord';
	
    build_template('tableau_bord.php', $params);
