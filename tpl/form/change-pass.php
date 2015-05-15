<article>
	<h2>Changer de mot de passe</h2>
	<form name="change-pass"
		action="<?php echo ROOT_URL.'security/change-pass.php';?>"
		method="POST" onsubmit="return change_pass(this);">
		<table>
			<tr>
				<td><label for="old-pass">Ancien mot de passe :</label></td>
				<td><input name="old-pass" type="password" /></td>
			</tr>
			<tr>
				<td colspan="2">
					<?php include ROOT.'tpl/form/pass-field.php';?>
				</td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="Changer le mot de passe" /></td>
			</tr>
		</table>
	</form>
</article>