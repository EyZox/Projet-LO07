<section id="messages">
	<p>Date : <?php echo $params['message']['date'];?></p>
	<p>De : <?php echo $params['message']['expediteur']['nom'].' '.$params['message']['expediteur']['prenom'].' ('.$params['message']['expediteur']['login'].')';?></p>
	<h1><?php echo $params['message']['titre'];?></h1>
	<p><?php echo $params['message']['content'];?></p>
</section>
<button onclick="document.getElementById('write-msg').style.display=''; this.style.display='none';">Répondre</button>
<?php include ROOT.'tpl/form/write-msg.php';?>