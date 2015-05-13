<article>
	<h2>Recharger son compte</h2>
	<form action="<?php echo ROOT_URL.'action/add-solde.php';?>" method="post" onsubmit="return validate_solde(this)">
		<p>
			<label for="cb-num">Numero de Carte Bancaire :</label>
			<input type="text" value="XXXX-XXXX-XXXX-XXXX" maxlength="19" name="cb-num"/>
		</p>
		<p>
			<label for="cb-expire">Date d'expiration :</label>
			<input name="cb-expire" type="text" value="XX/XX" maxlength="5"/>
		</p>
		<p>
			<label for="montant">Montant :</label>
			<input name="montant" type="number"/>€
		</p>
		<p>
			<input type="submit" value="Payer"/>
		</p>
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