<article>
	<table>
		<tr>
			<?php for ($i = 0; $i<$params['req']->columnCount(); $i++) {
				$tmp = $params['req']->getColumnMeta($i);
				echo '<th>'.$tmp['name'].'</th>';
			}?>
		</tr>
		<?php while(($user = $params['req']->fetch(PDO::FETCH_NUM))){
			echo '<tr>';
			for ($i = 0; $i<$params['req']->columnCount(); $i++) {
				echo '<td>'.($i==1?('<a href="'.ROOT_URL.'profil.php?id='.$user[0].'">'.$user[1].'</a>'):$user[$i]).'</td>';
			}
			echo '</tr>';
		}?>
	</table>
	<ul>
		<li><a href="users.php?p=<?php echo $params['page']-1;?>">Page précédente</a></li>
		<li><a href="users.php?p=<?php echo $params['page']+1;?>">Page suivante</a></li>
		<li><a href="index.php">Retour au panneau d'administration</a></li>
	</ul>
</article>
