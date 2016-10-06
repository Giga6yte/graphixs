<?php
	$got = $_REQUEST['dir_f']?$_REQUEST['dir_f']:'fview.php';

	$code = file_get_contents($got);
	$code = htmlspecialchars($code);
	$code = str_replace("\r\n", '</br>', $code);
	echo $code;
?>