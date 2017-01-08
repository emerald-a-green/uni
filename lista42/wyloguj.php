<?php
	session_start();
	
	$_SESSION['admin_ok'] = 0;
	
	header('Location: http://localhost/lista42/administrator.php');
?>