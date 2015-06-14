<section id="write-msg">
	<article>
		<form action="<?php echo ROOT_URL.'action/send-msg.php';?>" method="post">
		<input type="hidden" name="to" value="<?php echo $params['message']['expediteur']['id'];?>">
		<p><label for="titre">Titre du message : </label><input type="text" name="titre" value="<?php echo $params['message']['titre'];?>"></p>
		<p style="width:100%; height:350px;">
			<textarea style="width:100%;height:100%;" name="msg"></textarea>
		</p>
		<p><input type="submit" value="Envoyer"></p>
	</form>
	</article>
</section>