<?php
require_once __DIR__.'/global.php';
require_once ROOT.'security/auth_user.php';

build_template(array('form/profil.php','form/change-pass.php','form/add-solde.php'), array('title' => 'Votre profil'));
?>