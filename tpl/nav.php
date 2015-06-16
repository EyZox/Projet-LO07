<nav id="nav">

	<ul>
		<li><a href="<?php echo ROOT_URL.'profil.php';?>" class="profil"><?php echo $_SESSION['nom'] . ' ' . $_SESSION['prenom'];?></a></li>
		<li><a href="<?php echo ROOT_URL.'index.php';?>">Votre tableau de bord</a></li>
		<li><a href="<?php echo ROOT_URL.'vehicule.php';?>">Mon véhicule</a></li>
		<li><a href="<?php echo ROOT_URL.'avis.php'?>">Vos avis</a></li>
		<li><a href="<?php echo ROOT_URL.'rechercher-trajet.php';?>">Recherchez un trajet</a></li>
		<li><a href="<?php echo ROOT_URL.'vos-reservations.php';?>">Vos réservations</a></li>
		<li><a href="<?php echo ROOT_URL.'vos-annonces.php';?>">Vos annonces</a></li>
		<li><a href="<?php echo ROOT_URL.'messagerie.php';?>">Messagerie</a></li>
		<li><a href="<?php echo ROOT_URL.'proposez-trajet.php';?>">Proposez un trajet</a></li>
		<li><a href="<?php echo ROOT_URL.'loggout.php';?>">Se déconnecter</a></li>

	</ul>

</nav>
