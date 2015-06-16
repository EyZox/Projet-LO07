<section>
	<article>
		<?php while (($avis = $params['req']->fetch(PDO::FETCH_ASSOC))) {?>
		<table>
			<tr>
				<td id="td-avatar"><img src="<?php echo $avis['photo'];?>" alt="avatar" class="avatar"/></td>
				<td>
					<p><?php echo $avis['nom'].' '.$avis['prenom'];?></p>
					<p>Noté le <?php echo $avis['depart'];?> pour <a href="<?php echo ROOT_URL.'annonce.php?id='.$avis['tid'];?>">ce trajet</a></p>
					<p>Note : <?php echo $avis['note'];?>/5</p><br>
					<p><?php echo $avis['avis'];?></p>
				</td>
			</tr>
		</table>
		<?php }?>
	</article>
</section>
<ul>
	<li><a href="<?php echo ROOT_URL.'avis.php?id='.$params['id'].'&p='.$params['page']-1;?>">Page précédente</a></li>
	<li><a href="<?php echo ROOT_URL.'avis.php?id='.$params['id'].'&p='.$params['page']+1;?>">Page suivante</a></li>
</ul>