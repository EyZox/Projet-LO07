<?php
require_once __DIR__.'/global.php';
$title = 'Inscription';

include ROOT.'header.php';
?>

<div id="entete">
	<h1>Créer votre compte !</h1>
</div>
<div id="centre">
	<div id="contenu">
		<?php if(!empty($flashbag['error']) ) 
		{ ?>
		<div class="flashbag-error"><?php echo $flashbag['error'];?></div>
		<?php }
		include ROOT.'form/sign-up.php';
		?>
	</div>
</div>

<?php include ROOT.'footer.php';?>