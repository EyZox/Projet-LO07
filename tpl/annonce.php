<?php 

$pssgrs = array();
$deja_inscrit = false;
while($passager = $params['passagers']->fetch(PDO::FETCH_ASSOC)) {
	if($passager['id'] == $_SESSION['UID']) {
		$deja_inscrit = true;
	}
	$pssgrs[$passager['id']] = '<img src="'.$passager['photo'].'" alt="avatar-min" class="avatar-min"/> <a href="'.ROOT_URL.'profil.php?id='.$passager['id'].'" target="_blank">'.$passager['prenom'].' '.$passager['nom'].'</a>'; 
}


function donner_note($userID) {
	global $deja_inscrit, $params;
	if(($deja_inscrit || $_SESSION['UID'] == $params['conducteur']['id'] )&& $params['trajet']['effectue'] && $_SESSION['UID'] != $userID) {
		echo '<a href="'.ROOT_URL.'ecrire-avis.php?uid='.$userID.'&tid='.$params['trajet']['id'].'">Donner un avis</a>';
	}
}
?>

<section>
	<article>
		<h2>Trajet</h2>
		<ul>
			<li>Date : <?php echo $params['trajet']['depart'];?></li>
			<li>Ville de départ : <?php echo $params['trajet']['ville_d'];?></li>
			<li>Ville d'arrivée : <?php echo $params['trajet']['ville_a'];?></li>
			<li>Place(s) restante(s) : <?php echo $params['trajet']['place'];?></li>
			<li>Prix : <?php echo $params['trajet']['prix'];?></li>
		</ul>
		
		<h2>Conducteur</h2>
		<img src="<?php echo $params['conducteur']['photo'];?>" alt="avatar-min" class="avatar-min"/>
		<a href="<?php echo ROOT_URL.'profil.php?id='.$params['conducteur']['id'];?>" target="_blank"><?php echo $params['conducteur']['prenom'].' '.$params['conducteur']['nom'];?></a> 
		<?php donner_note($params['conducteur']['id']);

		
		if($pssgrs != '') {
			echo '<h2>Passagers</h2><ul>';
			foreach ($pssgrs as $key => $value) {
				echo '<li>'.$value.'     ';
				donner_note($key);
				echo '</li>';
			} 
			echo '</ul>';
		}
		
		if($params['trajet']['conducteur'] != $_SESSION['UID']) {
			if(!$deja_inscrit && !$params['trajet']['effectue'] && $params['trajet']['place'] > 0 && new DateTime($params['trajet']['depart']) > new DateTime()) {
				echo '<p><a href="'.ROOT_URL.'action/reserver.php?id='.$params['trajet']['id'].'">Reserver sa place</a></p>';
			}
		}else if(!$params['trajet']['effectue']){
			//if(new DateTime($params['trajet']['depart']) < new DateTime()) {
				?><p><a href="<?php echo ROOT_URL.'action/trajet-effectue.php?id='.$params['trajet']['id'];?>">Trajet effectué</a><p><?php 
			/*}*/?>
			
			<p><a href="<?php echo ROOT_URL.'action/annuler-trajet.php?id='.$params['trajet']['id'];?>">Annuler le trajet</a><p>
			<?php 
		}
		?>
	</article>
</section>