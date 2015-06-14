<section id="messages">
	<article>
		<p>Date : <?php echo $params['message']['date'];?></p>
		<p>De : <?php echo $params['message']['expediteur']['nom'].' '.$params['message']['expediteur']['prenom'];?></p>
		<h1><?php echo $params['message']['titre'];?></h1>
		<p><?php echo $params['message']['content'];?></p>
	</article>
</section>

<?php 
$params['message']['titre'] = 'Re : '.$params['message']['titre'];
include ROOT.'tpl/form/write-msg.php';?>