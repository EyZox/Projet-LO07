<section id="write-msg" style="display: none;">
	<form action="<?php echo ROOT_URL.'action/send-msg.php';?>" method="post">
		<input type="hidden" name="to" value="<?php echo $params['message']['expediteur']['id'];?>">
		<input type="text" name="title" value="Re : <?php echo $params['message']['titre'];?>">
		<textarea name="content"></textarea>
		<input type="submit" value="Répondre">
	</form>
</section>