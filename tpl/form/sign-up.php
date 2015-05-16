<article>
	<form method="post" enctype="multipart/form-data"
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
				<td><input type="text" id="datenaiss" name="datenaiss" value="1970-01-01" /></td>
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
		<script type="text/javascript">
	<!--
	jQuery('#datenaiss').datetimepicker({
		 lang:'fr',
		 timepicker:false,
		 mask:true,
		 maxDate:0,
		 format:'Y-m-d'
		});
	//-->
	</script>
</article>
