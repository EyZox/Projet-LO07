<article>
	<form action="<?php echo ROOT_URL.'action/vehicule.php';?>" method="post">
		<table>
			<tr>
				<td><label for="plaque">Plaque :</label></td>
				<td><input name="plaque" type="text" value="<?php if(isset($params['user']['vehicule'])) echo $params['user']['vehicule']['plaque'];?>"/></td>
			</tr>
			<tr>
				<td><label for="marque">Marque :</label></td>
				<td><input name="marque" type="text" value="<?php if(isset($params['user']['vehicule'])) echo $params['user']['vehicule']['marque'];?>"/></td>
			</tr>
			<tr>
				<td><label for="modele">Modèle :</label></td>
				<td><input name="modele" type="text" value="<?php if(isset($params['user']['vehicule'])) echo $params['user']['vehicule']['modele'];?>"/></td>
			</tr>
			<tr>
				<td><label for="couleur">Couleur :</label></td>
				<td><input name="couleur" type="color" value="<?php if(isset($params['user']['vehicule'])) echo $params['user']['vehicule']['couleur'];?>"/></td>
			</tr>
			<tr>
				<td><label for="mise_en_serv">Année de mise en service :</label></td>
				<td><input name="mise_en_serv" type="date" value="<?php if(isset($params['user']['vehicule'])) echo $params['user']['vehicule']['mise_en_serv']; else echo 'AAAA-MM-JJ';?>"/></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="Enregistrer"/></td>
			</tr>
		</table>
	</form>
</article>