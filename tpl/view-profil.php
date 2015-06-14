<article id="view-profil">
		<table>
			<tr>
				<td id="td-avatar"><img src="<?php echo $params['user']['photo'];?>" alt="avatar" class="avatar"/></td>
				<td>
					<table>
						<tr>
							<td>Nom :</td>
							<td><?php echo $params['user']['nom'];?></td>
						</tr>
						<tr>
							<td>Prénom :</td>
							<td><?php echo $params['user']['prenom'];?></td>
						</tr>
						<tr>
							<td>Note :</td>
							<td><?php echo empty($params['user']['note'])?'Pas encore reçu de notes':($params['user']['note'].'/5');?></td>
						</tr>
						<tr>
							<td colspan="2"><a href="<?php echo ROOT_URL.'ecrire-msg.php?to='.$params['user']['id'];?>">Envoyer un message</a></td>
						</tr>
						<tr>
							<td colspan="2"><a href="<?php echo ROOT_URL.'avis.php?id='.$params['user']['id'];?>">Voir les avis reçus</a></td>
						</tr>
					</table>
				</td>
			</tr>
			
		</table>
</article>