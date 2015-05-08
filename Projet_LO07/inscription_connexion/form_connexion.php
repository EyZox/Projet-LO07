<?php session_start();

$title='connexion';
        include '../header.php';?>
        
         <div id="globale">
             <div id="entete">
                 
		<h1>
		 Connexion
		</h1>
                 
	    </div>
            
            <div id="contenu">
       
        <?php
            $param = array('action' => 'form_connexion.php');
            include '../form/form_connexion.php';
            #si il a déjà tenté de se connecter avec de mauvais identifiants ; lui dire
        ?>
      
        <div id="pied">
		<p> Nouvel arrivant ? <a href="form_inscription.php">Inscrivez-vous</a> !</p>
        </div>
       
     </div>
             
    <?php include '../footer.php';?>
