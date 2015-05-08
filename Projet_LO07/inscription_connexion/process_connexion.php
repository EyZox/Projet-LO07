<?php
    
session_start();
    
$login = $_POST['login'];
$mdp = $_POST['mdp'];

if(FALSE) {
    #le cas où le login est celui de l'admin.
}   
elseif (true) {
    #est-ce que login & mdp existent dans la base de données ?
    
    $_SESSION['is_connected']=TRUE; 
    
    # les identifiants sont corrects, on stocke dans la session de la personne 
    # 1) sa validation de connexion 
    # 2) son login 
    # 3) son mdp
    # 4) son nom
    # 5) son prenom

   
    
    header('Location:../tableau_bord/tableau_bord.php');
   
}
    else {
        # noter dans la session qu'il s'est trompé
    header('Location:form_connexion.php');
}