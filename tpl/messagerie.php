<section id="messages">
	<table>
		<tr><th>Date</th><th>De</th><th>Objet</th></tr>
		<?php
		foreach ($params['messages'] as $message) {
			echo '<tr><td>'.$message['date'].'</td><td>'.$message['expediteur'].'</td><td><a href="'.ROOT_URL.'read-msg?id='.$message['id'].'">'.$message['titre'].'</a></td></tr>';
		}
		?>
	</table>
	<ul id="pagination">
		<?php
			if($params['msg_page'] > 1) {
				echo '<li id="prev-page"><a href="'.ROOT_URL.'messagerie.php?page='.($params['msg_page']+1).'">Page précédente</li>';
			}
			
			if(count($params['messages']) > 0) {
				echo '<li id="next-page"><a href="'.ROOT_URL.'messagerie.php?page='.($params['msg_page']+1).'">Page suivante</li>';
			}
		?>
	</ul>
</section>