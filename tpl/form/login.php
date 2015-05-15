<article>
	<form method="post" action="<?php echo $params['action'];?>">

		<table>
			<tr>
				<td><label for="login"> Votre login : </label></td>
				<td><input type="text" name="login" /></td>
			</tr>
			<tr>
				<td><label for="mdp"> Votre mot de passe : </label></td>
				<td> <input type="password" name="pass" /></td>
			</tr>
			<tr>
				<td colspan="2"><INPUT TYPE="submit" NAME="submit" VALUE="Se connecter"></td>
			</tr>
		</table>	
	
	</form>
	<p> Nouvel arrivant ? <a href="<?php echo ROOT_URL.'sign-up.php';?>">Inscrivez-vous</a> !</p>
</article>