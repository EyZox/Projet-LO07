					<table>
						<tr>
							<td><label for="pass">Mot de passe :</label></td>
							<td><input name="pass" type="password" /></td>
						</tr>
						<tr>
							<td><label for="pass-cfrm">Confirmer le mot de passe :</label></td>
							<td><input name="pass-cfrm" type="password" /></td>
						</tr>
					</table>
					<script type="text/javascript">
					<!--
					function change_pass($form) {
						if($form['pass'].value != $form['pass-cfrm'].value) {
							alert('Les mots de passe ne sont pas identiques');
							$form['pass'].value = '';
							$form['pass-cfrm'].value = '';
							return false;
						}else {
							return true;
						}
					}
					//-->
					</script>