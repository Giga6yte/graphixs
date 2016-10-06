<?php
	$got = $_REQUEST['dir_f']?$_REQUEST['dir_f']:'fload.php';

	header('Content-Description: File Transfer');
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename='.basename($got));
	header('Expires: 0');
	header('Cache-Control: must-revalidate');
	header('Pragma: public');
	header('Content-Length: ' . filesize($got));
	readfile($got);
?>