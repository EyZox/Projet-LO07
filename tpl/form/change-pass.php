<article>
	<h2>Changer de mot de passe</h2>
	<form name="change-pass" action="<?php echo ROOT_URL.'security/change-pass.php';?>" method="POST" onsubmit="return change_pass(this);">
		<table>
			<tr>
				<td><label for="current-pass">Mot de passe actuel :</label></td>
				<td><input name="current-pass" type="password" /></td>
			</tr>
			<tr>
				<td><label for="new-pass">Nouveau mot de passe :</label></td>
				<td><input name="new-pass" type="password" /></td>
			</tr>
			<tr>
				<td><label for="new-pass-cfrm">Confirmer le mot de passe :</label></td>
				<td><input name="new-pass-cfrm" type="password" /></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="Changer le mot de passe" /></td>
			</tr>
		</table>
	</form>
	<script type="text/javascript">
	<!--
	function change_pass($form) {
		if($form['new-pass'] != $form['new-pass-cfrm']) {
			alert('Les mots de passe ne sont pas identiques');
			$form['new-pass'] = '';
			$form['new-pass-cfrm'] = '';
			return false;
		}else {
			return true;
		}
	}
	//-->
	</script>
</article>