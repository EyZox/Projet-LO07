<header id="header">
	<img src="<?php echo ROOT_URL.'img/header.png';?>" alt="header"/>
	<h1><?php echo $params['title'];?></h1>
	<?php if(isset($flashbag)) { ?>
	<aside class="flashbag">
		<?php 
		foreach ($flashbag as $key => $value) {
			echo '<p class="'.$key.'">'.$value.'</p>';
		}
		?>
	</aside>
	<?php }?>

</header>