<?php
require_once __DIR__.'/global.php';
$title = 'connexion';


$params =  array();
if(empty($_SESSION['last-action']) || $_SESSION['last-action'] == ROOT_URL.'login.php') {
	$params['action'] =  ROOT_URL.'index.php';
}else {
	$params['action'] = $_SESSION['last-action'];
}


include ROOT.'header.php';
?>

<div id="globale">
	
	<div id="entete">
		<h1>Connexion</h1>
	</div>

	<div id="contenu">
		<?php if(!empty($flashbag['error'] )) 
		{ ?>
			<div class="flashbag-error"><?php echo $flashbag['error'];?></div>
		<?php }
			include ROOT.'form/login.php';
		?>														
	</div>

</div>
             
<?php include ROOT.'footer.php';?>