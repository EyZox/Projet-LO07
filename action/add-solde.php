<?php
require_once __DIR__ . '/../utils/global.php';
require_once ROOT . 'security/auth_user.php';
require_once ROOT . 'utils/sql.php';

if (!empty ($_POST['montant']) && is_numeric($_POST['montant'])) {
    if ($_POST['montant']<=0) {
        alert('error', 'Votre montant doit être positif.') ; 
    } 
    else {     
        $stmt = $DB->prepare ( 'UPDATE individu SET solde=solde+:solde WHERE id=:id' );
        $stmt->bindValue(':id', $_SESSION['UID']);
        $stmt->bindValue(':solde', $_POST['montant']);
        if ($stmt->execute()) {
            alert('success', 'Rechargement du solde effectué.');
        }
        else {
            alert ('error', 'Une erreur est survenue. Veuillez ré-essayer.');
        }
    }
    
}
else {
   alert('error', 'Pensez à renseigner un montant !');
}

header ( 'Location: ' . ROOT_URL. 'profil.php' );