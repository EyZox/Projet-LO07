<form method="post" action="<?php echo $params['action'];?>">

	<div>
		<label for="login"> Votre login : </label> <input type="text"
			name="login" />
	</div>

	<div>
		<label for="mdp"> Votre mot de passe : </label> <input type="password"
			name="mdp" />
	</div>

	<INPUT TYPE="submit" NAME="submit" VALUE="Se connecter">

</form>
<p> Nouvel arrivant ? <a href="<?php echo ROOT_URL.'sign-up.php';?>">Inscrivez-vous</a> !</p>