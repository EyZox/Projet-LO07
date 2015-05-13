<article>
	<h2>Recharger son compte</h2>
	<form action="<?php echo ROOT_URL.'action/add-solde.php';?>" method="post" onsubmit="return validate_solde(this)">
		<table>
			<tr>
				<td><label for="cb-num">Numero de Carte Bancaire :</label></td>
				<td><input type="text" value="XXXX-XXXX-XXXX-XXXX" maxlength="19" name="cb-num"/></td>
			</tr>
			<tr>
				<td><label for="cb-expire">Date d'expiration :</label></td>
				<td><input name="cb-expire" type="text" value="XX/XX" maxlength="5"/></td>
			</tr>
			<tr>
				<td><label for="montant">Montant (€):</label></td>
				<td><input name="montant" type="number"/></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="Payer"/></td>
			</tr>
		</table>
	</form>
	<script type="text/javascript">
	<!--
		function validate_solde($form) {
			if($form['montant'] <= 0) {
				alert('Vous devez préciser un montant > 0 €');
				return false;
			}else {
				return true;
			}
		}
	//-->
	</script>
</article>