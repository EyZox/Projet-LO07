<article>
	<form action="<?php echo ROOT_URL.'action/proposer-trajet.php';?>" method="post">
		<table>
			<tr>
				<td><label for="ville_d">Votre ville de départ :</label></td>
				<td><input type="text" name="ville_d"/></td>
			</tr>
			<tr>
				<td><label for="ville_a">Votre ville d'arrivée :</label></td>
				<td><input type="text" name="ville_a"/></td>
			</tr>
			<tr>
				<td><label for="date">Quand partez-vous ?</label></td>
				<td><input type="text" id="datetime" name="date" value="<?php echo date('Y-m-d H:i');?>"/></td>
			</tr>
			<tr>
				<td><label for="place">Nombre de place disponible :</label></td>
				<td><input name="place" type="number" value="1" min="1"/></td>
			</tr>
			<tr>
				<td><label for="prix">Quel prix demandez-vous ? (€)</label></td>
				<td><input type="number" name="prix" min="0"/></td>
			</tr> 
		</table>
	</form>
	<script type="text/javascript">
	<!--
	jQuery('#datetime').datetimepicker({
		 lang:'fr',
		 timepicker:true,
		 mask:true,
		 minDate:0,
		 format:'Y-m-d H:i'
		});
	//-->
	</script>
</article>