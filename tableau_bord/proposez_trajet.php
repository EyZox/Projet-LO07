<?php $title='proposez un trajet';
        include '../header.php';
       
        #$_SESSION['id_car']= "oui";
        #if(!isset($_SESSION['id_car'])) {
            #si l'utilisateur ne possède pas un id_car (une voiture) alors le renvoyer vers renseigner un véhicule en lui affichant un message.
        #header('Location: renseigner_vehicule.php');
            
        #}
        #else {
        
        session_start();
        $_SESSION['nom']="Pacaud";
        $_SESSION['prenom']="Diane";
       ?>
       
        <div id="globale">
            
            <div id="entete">
                <h1>
		 Bonjour<?php echo " ".$_SESSION["prenom"]; ?>, proposez un trajet !
		</h1>
            </div>
            
              <?php require '../navigation/nav.html';
            echo"<div id='contenu'>";
            include '../tpl/form/form_proposez_trajet.php';
	    echo"</div>";
     echo"</div>";
       
          #} 
         
     include '../footer.php';?>
