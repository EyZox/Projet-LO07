<article>
    <form action="<?php echo ROOT_URL.'action/vehicule.php';?>" method="post" onsubmit="return valide_form(this);">
		<table>
			<tr>
				<td><label for="plaque">Plaque :</label></td>
				<td><input name="plaque" type="text" value="<?php if(isset($params['user']['vehicule'])) echo $params['user']['vehicule']['plaque'];?>"/></td>
			</tr>
			<tr>
				<td><label for="marque">Marque :</label></td>
				<td><input name="marque" type="text" value="<?php if(isset($params['user']['vehicule'])) echo $params['user']['vehicule']['marque'];?>"/></td>
			</tr>
			<tr>
				<td><label for="modele">Modèle :</label></td>
				<td><input name="modele" type="text" value="<?php if(isset($params['user']['vehicule'])) echo $params['user']['vehicule']['modele'];?>"/></td>
			</tr>
			<tr>
				<td><label for="couleur">Couleur :</label></td>
				<td><input name="couleur" type="color" value="<?php if(isset($params['user']['vehicule'])) echo $params['user']['vehicule']['couleur'];?>"/></td>
			</tr>
			<tr>
				<td><label for="mise_en_serv">Année de mise en service :</label></td>
                                <td><input name="mise_en_serv" type="number" min="1950" value="<?php if(isset($params['user']['vehicule'])) echo $params['user']['vehicule']['mise_en_serv']; else echo 'AAAA';?>"/></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="Enregistrer"/></td>
			</tr>
		</table>
	</form>
    <script type="text/javascript">
	<!--
	function valide_form(form) {
            var date=parseInt(form['mise_en_serv'].value);
            if (!(date !== "NaN" && date > 1950 && date <= new Date().getFullYear())) {
                alert('Date invalide');
                return false;
            }
            return true;
        }
	//-->
	</script>
    
</article>

