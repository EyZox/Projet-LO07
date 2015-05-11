<?php
function form_begin($methode, $action) {
    return "<form method='$methode' action='$action' >";
}

function form_end() {
    return "</form>";
}

function form_input($id, $type, $name, $size, $value) {
    return "<label for='$id'> $id </label>"
            . "<input type='$type' name='$name' size='$size' value='$value' id='$id'/>";
}

function form_select($name, $listvalue) {
    $resultat = "<select name='$name'>";
    foreach ($listvalue as $element) {
        $resultat.="<option value='$element'> $element </option>";
    }
    $resultat.="</select>";
    return $resultat;
}


?>
