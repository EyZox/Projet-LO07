<form method="Post" action="">
    <select name="note">
        <option value="1">A éviter</option>
        <option value="2">Décevant</option>
        <option value="3">Bien</option>
        <option value="4">Excellent</option>
        <option value="5">Extraordinaire</option>
    </select>
    <p>
        <input type="hidden" name="target" value="<?php echo $params['id']; ?>"/>
        
        <textarea name="avis">Laissez un commentaire</textarea>
    </p>
</form>