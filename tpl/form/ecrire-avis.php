<section>
	<article>
		<form action="<?php echo ROOT_URL.'action/avis.php';?>" method="POST">
			<input type="hidden" name="uid" value="<?php echo $params['uid']; ?>"/>
			<input type="hidden" name="tid" value="<?php echo $params['tid']; ?>"/>
			<p>
				<label for="note">Note :</label>
				<select name="note">
					<option value="1">A éviter</option>
        			<option value="2">Décevant</option>
			        <option value="3">Bien</option>
			        <option value="4">Excellent</option>
			        <option value="5">Extraordinaire</option>
				</select>
			</p>
			<p style="width:100%; height:350px;">
				<textarea style="width:100%; height:100%;"name="avis"></textarea>
			</p>
			<p>
				<input type="submit" value="Valider"/>
			</p>
		</form>
	</article>
</section>