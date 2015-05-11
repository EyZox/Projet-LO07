<?php 
        require_once __DIR__.'/../security/auth_user.php';
       
        $title='votre tableau de bord';
        include '../header.php';
        ?>       
        
        <div id="globale">
             <div id="entete">
                 
		<h1>
		 Bonjour<?php #echo $_SESSION['prenom']; ?>, bienvenue sur votre session !
		</h1>
                 
		<p class="sous-titre">
		<strong><?php #$_SESSION['prenom']." ".$_SESSION['nom']; ?></strong>
               
		</p>
	    </div>
            
             <?php include '../navigation/nav.html'; ?>
            
            <div id="contenu">
                <p>
                    Bienvenu sur votre tableau de bord ! 
                 <?php #récuperer en requete SQL le solde pour le mettre dans la variable session ?>
                </br> Votre solde : <?php #echo $_SESSION['solde']; ?> 
                </p>
                
	    </div>
     
        </div>
   <?php include '../footer.php';?>