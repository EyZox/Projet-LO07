<?php $title='proposez un trajet';
        include '../header.php';?>
        
       <?php
       
        #$_SESSION['id_car']= "oui";
        #if(!isset($_SESSION['id_car'])) {
            #si l'utilisateur ne possède pas un id_car (une voiture) alors le renvoyer vers renseigner un véhicule en lui affichant un message.
        #header('Location: renseigner_vehicule.php');
            
        #}
        #else {
            
       ?>
       
        <div id="globale">
             <div id="entete">
                
		<h1>
		 Bonjour<?php #echo $_SESSION["prenom"]; ?>, proposez un trajet !
		</h1>
                 
		<p class="sous-titre">
		<strong><?php #$_SESSION["prenom"]." ".$_SESSION["nom"]; ?></strong>
               
		</p>
	    </div>
            
              <?php require '../navigation/nav.html';?>
            
            <div id="contenu">
            
                <!--contenu ! -->
               
	    </div>
     
        </div>
       
          <?php #} ?>

   <?php include '../footer.php';?>
