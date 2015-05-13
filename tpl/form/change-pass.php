<article>
	<h2>Changer de mot de passe</h2>
	<form name="change-pass" action="<?php echo ROOT_URL.'security/change-pass.php';?>" method="POST" onsubmit="return change_pass(this);">
		<p>
			<label for="current-pass">Mot de passe actuel :</label>
			<input name="current-pass" type="password" />
		</p>
		<p>
			<label for="new-pass">Nouveau mot de passe :</label>
			<input name="new-pass" type="password" />
		</p>
		<p>
			<label for="new-pass-cfrm">Confirmer le mot de passe :</label>
			<input name="new-pass-cfrm" type="password" />
		</p>
		<p>
			<input type="submit" value="Changer le mot de passe" />
		</p>
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