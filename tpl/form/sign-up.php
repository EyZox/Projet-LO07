<article>
	<form method="post"
		action="<?php echo ROOT_URL.'action/sign-up.php';?>"
		onsubmit="return change_pass(this);">

		<table>

			<tr>
				<td><label for="login"> Login : </label></td>
				<td><input type="text" name="login" /></td>
			</tr>
			<tr>
				<td colspan="2">
								<?php include ROOT.'tpl/form/pass-field.php';?>
							</td>

			</tr>
			<tr>
				<td><label for="nom">Nom :</label></td>
				<td><input name="nom" type="text" /></td>
			</tr>
			<tr>
				<td><label for="prenom">Prénom :</label></td>
				<td><input name="prenom" type="text" /></td>
			</tr>
			<tr>
				<td><label for="datenaiss"> Votre date de naissance :</label></td>
				<td><input type="date" name="datenaiss" value="AAAA-MM-JJ"
					maxlength="10" /></td>
			</tr>
			<tr>
				<td><label for="avatar">Avatar :</label></td>
				<td>
								<?php include ROOT.'tpl/form/avatar.php';?>
							</td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="S'inscrire"></td>
			</tr>
		</table>

	</form>
</article>
