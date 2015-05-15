
<div>
	<input type="radio" value="url" name="avatar-input"
		onchange="avatar_display();" checked="checked" /> <label
		for="avatar-input">URL</label> <input type="radio" value="file"
		name="avatar-input" onchange="avatar_display();" /> <label
		for="avatar-input">Fichier (Max : 2Mo)</label>
</div>
<div id="avatar-url">
	<label for="avatar-url">URL :</label> <input type="url"
		name="avatar-url" value="<?php if(isset($params['user']['photo'])) echo $params['user']['photo'];?>" />
</div>
<div id="avatar-file" style="display: none;">
	<input type="file" name="avatar-file" />
</div>
<script type="text/javascript">
<!--
		function avatar_display() {
			var radios = document.getElementsByName("avatar-input");
			for (var i = 0; i < radios.length; i++) {
				document.getElementById('avatar-'+radios[i].value).style.display = (radios[i].checked?"":"none");
			}
		}
//-->
</script>