<section>
	<article>
		<ul>
			<?php while(($res = $params['req']->fetch(PDO::FETCH_ASSOC))) {
				?><li><a href="<?php echo ROOT_URL.'annonce.php?id='.$res['id'];?>"><?php echo $res['depart'];?></a></li><?php
			}?>
		</ul>
	</article>
</section>