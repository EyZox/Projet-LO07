<?php
require_once '../global.php';
?>
<pre>
<?php
$session['flashbag']['error'][] = 'message erreur 1';
$session['flashbag']['error'][] = 'message erreur 2';
$session['flashbag']['error'][] = 'message erreur 3';
$session['flashbag']['success'][] = 'message success 1';
$session['flashbag']['success'][] = 'message success 2';
foreach ($session['flashbag'] as $level => $array ) {
	foreach ($array as $message ) {
	echo "level=$level message=$message<br>";
	}
}
?>
</pre>
