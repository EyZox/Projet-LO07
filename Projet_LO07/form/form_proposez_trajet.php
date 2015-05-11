<form method="Post" action="">
    <p>
    <label for="ville_d">Votre ville de départ :</label>
    <input type="text" name="ville_d"> 
    </p>
    <p>
    <label for="ville_a">Votre ville d'arrivée :</label>
    <input type="text" name="ville_a"> 
    </p>
    <p>
    <label for="date">Quel jour partez vous ?</label>
    <input type="date" name="date" value="10/06"> 
    </p>
    <p>
    <label for="heure">A quelle heure partez-vous ?</label>
    <select name="heure">
        <?php for ($i=0; $i<24; $i++) { 
            echo "<option value=$i>$i h</option>"; }?>
    </select>
    </p>
    <p>
       <label for="place_dispo">Nombre de place disponible :</label>
       <select name="place_dispo">
       <?php for ($i=1; $i<8; $i++) { 
       echo "<option value=$i>$i</option>";}?>    
    </select>
    </p>
    <p>
    <label for="prix">Quel prix demandez-vous ?</label>
    <input type="number" name="prix"> 
    </p>
</form>