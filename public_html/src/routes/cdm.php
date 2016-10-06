<?php
	session_start();
	$_SESSION['page_id'] = 3;
	header("Location: ../../public/default.php");
?>