<?php
	session_start();
	$_SESSION['page_id'] = 1;
	header("Location: ../../public/default.php");
?>