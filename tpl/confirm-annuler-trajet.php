<article>
	<p>Il y a déjà <?php echo $params['nb_passagers'];?> reservation(s) pour ce trajet, si vous l'annulez vous recevrez une pénalité de 10€ par personne inscrite, soit une pénalité totale de <?php echo $params['nb_passagers']*10;?>€</p>
	<p><a href="<?php echo ROOT_URL.'action/annuler-trajet.php?id='.$params['trajet']['id'].'&proceed=1';?>">J'annule de trajet et j'accepte la pénalité imposé</a></p>
	<p><a href="<?php echo ROOT_URL.'annonce.php?id='.$params['trajet']['id'];?>">Je n'annule pas le trajet</a></p>
</article>