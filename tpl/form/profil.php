<article>
	<h2>Modifier mes informations personnelles</h2>
	<form action="<?php echo ROOT_URL.'action/edit-user.php';?>" name="edit-user" method="POST">
		<p>
			<label for="nom">Nom :</label>
			<input name="nom" value="<?php echo $params['user']['nom'];?>" type="text"/>
		</p>
		<p>
			<label for="prenom">Prenom :</label>
			<input name="prenom" value="<?php echo $params['user']['prenom'];?>" type="text"/>
		</p>
		<p>
			<label for="avatar">Avatar :</label>
			<input name="upload" value="Ou depuis votre ordinateur" type="button"/>
			<input name="avatar" value="<?php echo $params['user']['photo'];?>" type="text"/>
			
		</p>
		<p>
			<input type="submit" value="Editer">
		</p>
	</form>
</article>