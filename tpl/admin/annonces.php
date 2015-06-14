<article>
	<table>
		<tr>
			<th>Annonce</th>
		</tr>
		<?php while(($annonce = $params['req']->fetch(PDO::FETCH_ASSOC))){
			echo '<tr>';
			echo '<td><a href="'.ROOT_URL.'annonce.php?id='.$annonce['id'].'">'.ROOT_URL.'annonce.php?id='.$annonce['id'].'</a></td>';
			echo '</tr>';
		}?>
	</table>
	<ul>
		<li><a href="annonces.php?p=<?php echo $params['page']-1;?>">Page précédente</a></li>
		<li><a href="annonces.php?p=<?php echo $params['page']+1;?>">Page suivante</a></li>
		<li><a href="index.php">Retour au panneau d'administration</a></li>
	</ul>
</article>
