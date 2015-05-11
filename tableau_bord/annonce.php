<?php $title='vos annonces';
        include '../header.php';?>
       
       
        <div id="globale">
            
             <div id="entete">
                <h1>
		 Bonjour<?php #echo $_SESSION['prenom']; ?>, voici vos annonces !
		</h1>
            </div>
            
              <?php include '../navigation/nav.html';
              if(FALSE /*si le nombre de trajets de l'id_conducteur identifié est nul*/) {
               echo "<p>Vous n'avez proposé aucun trajets !</p>";
              }
              else {
                  /*   AFFICHAGE DES TRAJETS PROPOSES PAR LE CONDUCTEUR
                  $liste="<ul>";
                  foreach ($_SESSION['trajets'] as $trajet) {
                      $liste .="<li>$trajet</li>";
                  }
                  $liste .="</ul>";
                   * 
                   *Ajouter les options ; supprimer/valider 
                   * 
                   */
              }
              ?>
            
            <div id="contenu">
                
            </div>
     
        </div>
   <?php include '../footer.php';?>