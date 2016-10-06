<?php
	session_start();
	$_SESSION['page_id'] = 2;
	header("Location: ../../public/default.php");
?>