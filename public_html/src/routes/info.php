<?php
	session_start();
	$_SESSION['page_id'] = 4;
	header("Location: ../../public/default.php");
?>