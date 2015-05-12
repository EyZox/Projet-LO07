<form method="post"
	action="<?php echo ROOT_URL.'security/sign-up.php';?>">

	<div>
		<label for="nom"> Nom : </label> <input type="text" name="nom" />
	</div>

	<div>
		<label for="prenom"> Prénom : </label> <input type="text"
			name="prenom" />
	</div>

	<div>
		<label for="datenaiss"> Votre date de naissance : </label> <input
			type="date" name="datenaiss" />
	</div>

	<div>
		<label for="login"> Login : </label> <input type="text" name="login" />
	</div>

	<div>
		<label for="mdp">Choisissez un mot de passe :</label> <input
			type="password" name="mdp" />
	</div>

	<div>
		<label for="image">Choisissez une photo :</label> <input type="text"
			name="image" />
	</div>
	<INPUT TYPE="submit" NAME="submit" VALUE="Valider">

</form>
