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
						var pass-cfrm = $form['pass-cfrm'].value;
						$form['pass-cfrm'].value = '';
						if($form['pass'].value != pass-cfrm) {
							alert('Les mots de passe ne sont pas identiques');
							$form['pass'].value = '';
							return false;
						}else {
							return true;
						}
					}
					//-->
					</script>