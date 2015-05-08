<?php $title='creer votre compte';
        include '../header.php';?>
        
       
      <div id="entete">
                 
		<h1>
		 Créer votre compte !   
		</h1>
          
      </div>
       
        <div id="centre">
               
        <div id="contenu">
 <?php 
        
    if (array_key_exists('nom', $_POST) && array_key_exists('prenom', $_POST) && array_key_exists('login', $_POST)&& array_key_exists('mdp', $_POST) && array_key_exists('datenaiss', $_POST)) {
            //if (!isset ($_POST['nom'], $_POST['prenom'], $_POST['login'], $_POST['mdp'], $_POST['datenaiss'])) {
            if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['login']) || empty($_POST['mdp']) || empty($_POST['datenaiss'])){
                 echo "<p>Merci de remplir tous les champs.</p>";
                 }
            else {    
                  #affecter les nouvelles données à la base de données.
                  echo ("<p>Merci ". $_POST['prenom']." ". $_POST['nom'].", votre inscription a bien été prise en compte. </br> <a href='form_connexion.php'> Connectez-vous </a> </p>");
                 }
    }
   
    else {
            include '../form/form_inscription.html';
        }
      ?> 
        
      </div>
        
             <div id="pied">
		<p>Le contenu de mon pied de page. 
                   Mise en page &copy; 2008
                </p>
             </div>
            
        </div>
        
   <?php include '../footer.php';?>