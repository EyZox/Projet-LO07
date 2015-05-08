<?php $title='recherchez un trajet';
        include '../header.php';?>
       
       
        <div id="globale">
             <div id="entete">
                 
		<h1>
		 Bonjour<?php #echo $_SESSION['prenom']; ?>, recherchez un trajet !
		</h1>
                 
		<p class="sous-titre">
		<strong><?php #$_SESSION['prenom']." ".$_SESSION['nom']; ?></strong>
               
		</p>
	    </div>
            
              <?php include '../navigation/nav.html';?>
            
            <div id="contenu">
            
                
	    </div>
     
        </div>
   <?php include '../footer.php';?>