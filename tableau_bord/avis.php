<?php $title='vos avis';
        include('../header.php');?>
       
        <div id="globale">
             <div id="entete">
                 
		<h1>
		 Bonjour<?php #echo $_SESSION['prenom']; ?>, voici vos avis !
		</h1>
                 
		<p class="sous-titre">
		<strong><?php #$_SESSION['prenom']." ".$_SESSION['nom']; ?></strong>
               
		</p>
	    </div>
            
              <?php include '../navigation/nav.html'; ?>
            
            <div id="contenu">
            
                
	    </div>
     
        </div>
        
   <?php include '../footer.php';?>