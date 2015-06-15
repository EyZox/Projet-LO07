<section>
	<article>
		<form action="<?php echo ROOT_URL.'rechercher-trajet.php';?>" method="get">
		<?php if (isset($params['hidden'])) {
			foreach ($params['hidden'] as $key => $value) {
				?><input type="hidden" name="<?php echo $key;?>" value="<?php echo $value;?>"><?php
			}
			
		}?>
			<p>
				<label for="<?php echo $params['field_name'];?>"><?php echo $params['label'];?></label>
				<select name="<?php echo $params['field_name'];?>">
					<?php $i = 0; while(($res = $params['req']->fetch(PDO::FETCH_ASSOC))) {
						$i++;
						echo '<option value="'.$res[$params['field_name']].'">'.$res[$params['field_name']].'</option>';
					}?>
				</select>
				<?php if($i > 0) {?> <input type="submit" value="Valider"><?php }
				else {?> <span>Aucune annonce n'a été trouvé</span><?php }?>
			</p>
		</form>
	</article>
</section>