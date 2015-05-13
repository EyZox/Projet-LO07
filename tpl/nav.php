<nav id="nav">

	<ul>
		<li><a href="#profil"><?php echo $params['user']['nom'] . ' ' . $params['user']['prenom'];?></a></li>
		<li><a href="<?php echo ROOT_URL.'index.php';?>">Votre tableau de bord</a></li>
		<li><a href="avis.php">Vos avis</a></li>
		<li><a href="recherchez_trajet.php">Recherchez un trajet</a></li>
		<li><a href="reservation.php">Vos réservations</a></li>
		<li><a href="annonce.php">Vos annonces</a></li>
		<li><a href="messagerie.php">Messagerie</a></li>
		<li><a href="proposez_trajet.php">Proposez un trajet</a></li>
		<li><a href="<?php echo ROOT_URL.'loggout.php';?>">Se déconnecter</a></li>

	</ul>

</nav>
