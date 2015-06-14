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
		
		<?php $pssgrs = '';
		
		while($passager = $params['passagers']->fetch(PDO::FETCH_ASSOC)) {
			$pssgrs .= '<li><img src="'.$passager['photo'].'" alt="avatar-min" class="avatar-min"/> <a href="'.ROOT_URL.'profil.php?id='.$passager['id'].'" target="_blank">'.$passager['prenom'].' '.$passager['nom'].'</a></li>'; 
		}
		
		if($pssgrs != '') {
			echo '<h2>Passagers</h2>
				<ul>'.$pssgrs.'</ul>';
		}
		
		if($params['trajet']['conducteur'] != $_SESSION['UID']) {
			if(!$params['trajet']['effectue'] && $params['trajet']['place'] > 0 && new DateTime($params['trajet']['depart']) < new DateTime()) {
				echo '<p><a href="'.ROOT_URL.'action/reserver.php?id='.$params['trajet']['id'].'">Reserver sa place</a></p>';
			}
		}else if(!$params['trajet']['effectue']){?>
			<p><a href="<?php echo ROOT_URL.'action/trajet-effectue.php?id='.$params['trajet']['id'];?>">Trajet effectué</a><p>
			<p><a href="<?php echo ROOT_URL.'action/annuler-trajet.php?id='.$params['trajet']['id'];?>">Annuler le trajet</a><p>
			<?php 
		}
		
		if($params['trajet']['effectue']) {
			//avis
		}
		?>
	</article>
</section>