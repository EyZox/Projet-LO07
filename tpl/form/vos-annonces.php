<section>
	<article>
		<table>
			<tr><th>Date</th><th>Ville de départ</th><th>Ville d'arrivée</th><th></th></tr>
			<?php
				$i = 0; 
				while(($trajet = $params['trajets']->fetch(PDO::FETCH_ASSOC))) {
				echo "<tr".($trajet['effectue']?' class="effectue"':'')."><td>$trajet[depart]</td><td>$trajet[ville_d]</td><td>$trajet[ville_a]</td><td>".'<a href="'.ROOT_URL.'annonce.php?id='.$trajet['id'].'">Voir l\'annonce</a></td></tr>';
				$i++;
				}
				
				if($i == 0) {
					echo '<tr><td colspan="4" style="text-align:center;">Vous n\'avez posté aucune annonce</td></tr>';
				}
			?>
		</table>
		<p><a href="<?php echo ROOT_URL.'proposez-trajet.php';?>">Poster une annonce</a></p>
	</article>
</section>