<?php
require_once '../global.php';
?>
<pre>
<?php print_r(getUser(1));
if(PDO::PARAM_NULL) echo 'true';
else echo 'false';
?>
</pre>
