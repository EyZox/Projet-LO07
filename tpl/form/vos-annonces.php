<section>
	<article>
		<table>
			<tr><th>Date</th><th>Ville de départ</th><th>Ville d'arrrivé</th></tr>
			<?php
				$i = 0; 
				while(($trajet = $params['trajets']->fetch(PDO::FETCH_ASSOC))) {
				echo "<tr><td>$trajet[depart]</td><td>$trajet[ville_d]</td><td>$trajet[ville_a]</td></tr>";
				$i++;
				}
				
				if($i == 0) {
					echo '<tr><td colspan="3">Vous n\'avez posté aucune annonce</td></tr>';
				}
			?>
		</table>
		<p><a href="<?php echo ROOT_URL.'proposez-trajet.php';?>">Poster une annonce</a></p>
	</article>
</section>