<?php
	session_start();
	$_SESSION['page_id'] = 5;
	header("Location: ../../public/default.php");
?>