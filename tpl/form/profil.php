<article id="edit-profil">
	<h2>Modifier mes informations personnelles</h2>
	<form action="<?php echo ROOT_URL.'action/edit-user.php';?>" name="edit-user" method="POST">
		<table>
			<tr>
				<td id="td-avatar"><img src="<?php echo $params['user']['photo'];?>" alt="avatar" class="avatar"/></td>
				<td>
					<table>
						<tr>
							<td><label for="nom">Nom :</label></td>
							<td><input name="nom" value="<?php echo $params['user']['nom'];?>" type="text"/></td>
						</tr>
						<tr>
							<td><label for="prenom">Prenom :</label></td>
							<td><input name="prenom" value="<?php echo $params['user']['prenom'];?>" type="text"/></td>
						</tr>
						<tr>
							<td><label for="avatar">Avatar :</label></td>
							<td><input name="avatar" value="<?php echo $params['user']['photo'];?>" type="text"/></td>
						</tr>
						<tr>
							<td colspan="2"><input name="upload" value="Ou depuis votre ordinateur" type="button"/></td>
						</tr>
						<tr>
							<td colspan="2"><input type="submit" value="Editer"></td>
						</tr>
					</table>
				</td>
			</tr>
			
		</table>
	</form>
</article>