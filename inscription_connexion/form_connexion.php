<?php session_start();

$title='connexion';
        include '../header.php';?>
         <?php print_r($_SESSION);?>
         <div id="globale">
             <div id="entete">
                 
		<h1>
		 Connexion
		</h1>
                 
	    </div>
            
            <div id="contenu">
                <div id="error">
                    <?php
                    if(isset($_SESSION['flashbag']) && $_SESSION['flashbag']!="") {
                        echo $_SESSION['flashbag'];
                        unset($_SESSION['flashbag']);
                    }
                    ?>
                </div>
       
        <?php
            $param = array('action' => '../tableau_bord/tableau_bord.php');
            include '../form/form_connexion.php';
            #si il a déjà tenté de se connecter avec de mauvais identifiants ; lui dire
        ?>
     
		<p> Nouvel arrivant ? <a href="form_inscription.php">Inscrivez-vous</a> !</p>
      
       
     </div>
             
    <?php include '../footer.php';?>
