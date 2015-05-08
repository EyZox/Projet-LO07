<?php $title='renseignez un vehicule';
        include '../header.php';?>
       
      <?php  
     
        if (array_key_exists('plaque', $_GET) && 
            array_key_exists('marque', $_GET) && 
            array_key_exists('modele', $_GET) && 
            array_key_exists('couleur', $_GET) && 
            array_key_exists('a_m_s', $_GET)) {
            
            if (!isset ($_GET['plaque'], $_GET['marque'], $_GET['modele'], $_GET['couleur'], $_GET['a_m_s'])) {
                
                echo "<p>Merci de remplir tous les champs.</p>";
                
                 }
                 
            else {
               #envoyer les donées du véhicule dans la base de données en les liant bien à leur propriétaire.
                echo"Vos informations ont bien été prises en compte.";
                } 
            }        
                
        else { ?>
       
        <div id="globale">
             <div id="entete">
                 
		<h1>
		 Bonjour<?php #echo $_SESSION['prenom']; ?>, renseignez d'abord votre véhicule !
		</h1>
                 
		<p class="sous-titre">
		<strong><?php #$_SESSION['prenom']." ".$_SESSION['nom']; ?></strong>
               
		</p>
	    </div>
          
            
            <div id="contenu">
               <?php include '../form/form_vehicule.html'; ?>
	    </div>
     
        </div>
        
        <?php } include '../footer.php';?>